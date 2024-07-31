<?php
namespace App\Queue;

use DateTime;
use App\Job;
use App\Utils\DB;
use App\Utils\ORM;

class Dispatcher
{
    private $job;
    private $queue = 'default';

    public function __construct($job)
    {
        $this->job = $job;
    }

    public function onQueue($queue)
    {
        $this->queue = $queue;
    }

    public function __destruct()
    {
        $payload = serialize(['job' => $this->job]);



        $encode = json_encode($payload);
        // $now = (new DateTime("now"))->format(DateTime::RSS);
        // $query = DB::connection()->prepare("INSERT INTO jobs (queue, running, payload, created_at) VALUES (?, ?, ?, ?)");
        // $query->execute([$this->queue, 0, $encode, $now]);
        // // var_dump([

        // //     // 'INI_JOB' => $this->job
        // //     'payload' => $payload,
        // // ]);

        // // return response()->json([
        // //     'payload' => $payload,
        // //     'job' => $this->job
        // // ]);

        // // return;

        // // $qb = ORM::manager()->createQueryBuilder();
        // // // $qb->dba_insert()


        $job = new Job();
        $job->setQueue($this->queue);
        $job->setPayload($encode);
        $job->setRunning(0);
        $job->setCreatedAt(new DateTime("now"));
        
        $manager = ORM::manager();
        $manager->persist($job);
        $manager->flush();
    }
}
