<?php
namespace App\Queue;

use App\Database\DB;
use App\Job;
use App\User;
use App\Utils\ORM;

class QueueRunner
{
    private $queue;

    public function __construct($queue = null)
    {
        $this->queue = $queue ?: 'default';
    }

    public function run()
    {
        $queue = $this->queue;
        while (true) {
            $qb = ORM::manager()->createQueryBuilder();
            $qb->select(['j'])
                ->from(Job::class, 'j')
                // ->where("j.running = 0")
                ->where("j.queue = '$queue'")
                ->orderBy('j.createdAt', 'ASC')
                ->setMaxResults(1);



                
                $query = $qb->getQuery();
                
                $job = $query->getOneOrNullResult();
                


            if (!$job) {
                sleep(1);
                continue;
            }

            // $job = ORM::manager()->find(Job::class, $job->getId());
            $job->setRunning(1);
            ORM::manager()->flush();

            $jobId = $job->getId();

            $payload = unserialize(json_decode($job->getPayload()));



            // DB::connection()->query("UPDATE jobs SET running = 1 WHERE id = '{$job->id}'");
            $jobObject = $payload['job'];
            $jobClass = get_class($jobObject);

            try {
                echo "[".date('Y-m-d H:i:s')."][{$jobId}] Processing Job {$jobClass} \r\n";
                $jobObject->handle();
                echo "[".date('Y-m-d H:i:s')."][{$jobId}] Processed Job {$jobClass} \r\n";
            } catch (\Exception $e) {
                echo "[".date('Y-m-d H:i:s')."][{$jobId}] Job {$jobClass} failed: {$e->getMessage()} \r\n";
            }


            $manager = ORM::manager();
            $job = $manager->find(Job::class, $jobId);
            if ($job) {
                $manager->remove($job);
                $manager->flush();
            }

            // $qb->delete(Job::class, 'j')->where("id = $jobId");
            // $query = $qb->getQuery();
            // $query->execute();

            // // DB::connection()->query("DELETE FROM jobs WHERE id = {$job->id}");
            // $sql = "DELETE FROM jobs WHERE id = {$job->id}";
            // $qry = ORM::manager()->createQuery($sql);
            // $qry->execute();
        }
    }
}
