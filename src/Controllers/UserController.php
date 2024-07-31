<?php

namespace App\Controllers;

use App\Jobs\SendEmailJob;
use App\OAuth\Oauth;
use App\OAuthUser;
use App\User;
use App\Utils\ORM;
use Faker\Factory;
use OAuth2\Request;
use Rakit\Validation\Validator;

class UserController
{

    public function login()
    {

        $request = new Request();

        $validator = new Validator();

        $validation = $validator->validate(input()->all(), [
            'username'   => 'required',
            'password'      => 'required',
            'grant_type'      => 'required',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return response()->json([
                'message' => 'Failed',
                'status' => false,
                'errors' => $errors->firstOfAll(),
            ]);
        }

        $oauth = new Oauth();
        $respond = $oauth->server->handleTokenRequest($request->createFromGlobals());
        $code = $respond->getStatusCode();
        $body = $respond->getResponseBody();
        $body = json_decode($body);
        if ($code !== 200) {
            return response()->json([
                'status' => false,
                'message' => "Failed",
                'errors' => $body,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => "successfully",
            'data' => $body,
        ]);
    }

    public function index()
    {
        $repo = ORM::manager()->getRepository(OAuthUser::class);
        $users = $repo->findAll();

        $users = array_map(function ($user) {
            return [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'username' => $user->getUsername(),
                'email_verified' => $user->getEmailVerified(),
            ];
        }, $users);

        return response()->json([
            'status' => true,
            'message' => "successfully",
            'data' => $users,
        ]);
    }

    public function seed()
    {
        try {
            $total = input('total', '10', 'post');
            $faker = Factory::create();
            // $password = password_hash('password', PASSWORD_DEFAULT);
            $password = sha1('password');

            $length = intval($total);



            $manager = ORM::manager();

            $user = new OAuthUser();
            $user->setName("admin");
            $user->setEmail("admin@admin.com");
            $user->setUsername("admin");
            $user->setEmailVerified(true);
            $user->setPassword($password);
            $user->setScope('app'); 
            $manager->persist($user);

            for ($i = 0; $i < $length; $i++) {
                $name = $faker->name();
                $email = $faker->safeEmail();
                $username = $faker->userName();

                $user = new OAuthUser();
                $user->setName($name);
                $user->setEmail($email);
                $user->setUsername($username);
                $user->setEmailVerified(true);
                $user->setPassword($password);
                $manager->persist($user);
            }
            $manager->flush();



            return response()->json([
                'status' => true,
                'message' => "successfully",
                'data' => [],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'message' => "Failed",
                'data' => [],
                "errors" => [
                    "message" => $th->getMessage(),
                    "file" => $th->getFile(),
                    "line" => $th->getLine(),
                ]
            ]);
        }
    }

    public function sendMail()
    {
        try {
            $validator = new Validator();

            $validation = $validator->validate(input()->all(), [
                'subject'   => 'required',
                'body'      => 'required',
            ]);

            if ($validation->fails()) {
                $errors = $validation->errors();
                return response()->json([
                    'message' => 'Failed',
                    'status' => false,
                    'errors' => $errors->firstOfAll()
                ]);
            }

            $subject = input()->post('subject')->value;
            $body = input()->post('body')->value;



            $repo = ORM::manager()->getRepository(OAuthUser::class);
            $users = $repo->findAll();
            $emails = array_map(fn ($user) => $user->getEmail(), $users);
            SendEmailJob::dispatch($emails, $subject, $body);


            return response()->json([
                'status' => true,
                'message' => "successfully",
                'data' => [
                    'emails' => $emails,
                    'subject' => $subject,
                    'body' => $body,
                ],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'message' => "Failed",
                'data' => [],
                "errors" => [
                    "message" => $th->getMessage(),
                    "file" => $th->getFile(),
                    "line" => $th->getLine(),
                ]
            ]);
        }
    }

    // public function runQueue()
    // {
    //     try {

    //         return response()->json([
    //             'status' => true,
    //             'message' => "successfully",
    //             'data' => [
    //                 'emails' => $emails,
    //                 'subject' => $subject,
    //                 'body' => $body,
    //             ],
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => true,
    //             'message' => "Failed",
    //             'data' => [],
    //             "errors" => [
    //                 "message" => $th->getMessage(),
    //                 "file" => $th->getFile(),
    //                 "line" => $th->getLine(),
    //             ]
    //         ]);
    //     }
    // }
}
