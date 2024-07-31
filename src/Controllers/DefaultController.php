<?php
namespace App\Controllers;

use Pecee\Http\Response;

class DefaultController
{
    public function home(): string
    {
        // implement
        return sprintf('DefaultController -> index (?fun=%s)', input('fun'));
    }
    
    public function contact(): string
    {
        return 'DefaultController -> contact';
    }
    public function companies($id = null): string
    {
        return 'DefaultController -> companies -> id: ' . $id;
    }

    public function notFound(): Response
    {
        return response()->json([
            'status' => false,
            'message' => 'Page not found'
        ]);
    }
}
