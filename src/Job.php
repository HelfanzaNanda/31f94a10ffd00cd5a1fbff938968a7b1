<?php
namespace App;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Serializable;

#[ORM\Entity]
#[ORM\Table(name: 'jobs')]

class Job
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;
    #[ORM\Column(type: 'integer')]
    private string $running;
    #[ORM\Column(type: 'string')]
    private string $queue;
    #[ORM\Column(type: 'text')]
    private string $payload;
    #[ORM\Column(name:'created_at', type: 'datetime')]
    private DateTime $createdAt;

    public function getId(): string
    {
        return $this->id;
    }
    
    public function getRunning(): string
    {
        return $this->running;
    }

    public function setRunning(int $running): void
    {
        $this->running = $running;
    }

    public function getQueue(): string
    {
        return $this->queue;
    }

    public function setQueue(string $queue): void
    {
        $this->queue = $queue;
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function setPayload(string $payload): void
    {
        $this->payload = $payload;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
