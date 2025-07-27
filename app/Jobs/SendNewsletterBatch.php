<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\NewsletterMail;


class SendNewsletterBatch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emails;
    protected $subject;
    protected $message;

    // public $tries = 3;
    // public $backoff = 60;

    public function __construct($emails, $subject, $message)
    {
        $this->emails = $emails;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function handle()
    {
        $mailer = app('mailer');

        foreach ($this->emails as $email) {
            try {
            logger()->info("Attempting to send to: $email");
            
            $mailer->to($email)
                ->send(new NewsletterMail($this->subject, $this->message));
            
            usleep(500000);
            
            } catch (\Throwable $e) {
            logger()->error("FAILED to send to $email: " . $e->getMessage());
            continue;
            }
        }
    }
}
