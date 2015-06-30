<?php

namespace App\LaraBin\Mail;

use App\LaraBin\Models\User;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer
{
    protected $mailer;

    protected $from = 'no-reply@larabin.com';

    protected $to;

    protected $subject;

    protected $view;

    protected $data = [];

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmailConfirmationTo(User $user)
    {
        $this->to = $user->email;
        $this->view = 'emails.auth.confirm';
        $this->subject = 'LaraBin.com - Confirm your email!';
        $this->data = ['token' => $user->emailVerification->token];

        $this->deliver();
    }

    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function($message) {
            $message->from($this->from, 'LaraBin No-Reply')
                    ->to($this->to)
                    ->subject($this->subject);
        });
    }
}