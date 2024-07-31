<?php
namespace App\Jobs;

use App\Queue\Dispatchable;
use App\Queue\JobInterface;
use App\Utils\Config;
use PHPMailer\PHPMailer\PHPMailer;

class SendEmailJob implements JobInterface
{
    use Dispatchable;

    private $emails = [];
    private $subject = null;
    private $body = null;

    public function __construct(array $emails, string $subject, string $body)
    {
        $this->emails = $emails;
        $this->subject = $subject;
        $this->body = $body;
    }

    public function handle()
    {

        $phpmailer = new PHPMailer(true);
        try {
            foreach ($this->emails as $email) {
                $phpmailer->isSMTP();
                $phpmailer->Host = Config::getSMTP('SMTP_HOST');
                $phpmailer->SMTPAuth = true;
                $phpmailer->Port = Config::getSMTP('SMTP_PORT');
                $phpmailer->Username = Config::getSMTP('SMTP_USER');
                $phpmailer->Password = Config::getSMTP('SMTP_PASSWORD');
    
                $phpmailer->setFrom(Config::getSMTP('SMTP_FROM_EMAIL'), Config::getSMTP('SMTP_FROM_NAME'));
                $phpmailer->addAddress($email);
                $phpmailer->isHTML(true);
                $phpmailer->Subject = $this->subject;
                $phpmailer->Body    = $this->body;
                $phpmailer->send();
                echo "Sending an email to $email \r\n";
            }
        } catch (\Throwable $th) {
            echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
        }
    }
}
