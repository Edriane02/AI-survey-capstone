<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
use App\Models\User;

class CustomSetPasswordMail extends Mailable
{
    use  Queueable, SerializesModels;

    public $user;
    public $token;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, $token)
    {
        //
        $this->user = $user;
        $this->token = $token;
        
    }

     public function build()
    {
        $url = URL::temporarySignedRoute(
            'auth.set-account',
            now()->addMonth(2), // Expire in 2 months
            [
                'user' => $this->user->id,
                'email' => $this->user->email,
                'token' => $this->token
            ]
        );

        return $this->subject('Action Required: Set Your AI Survey Account Setup')
            ->view('emails.set-acc-link')
            ->with([
                'url' => $url,
                'user' => $this->user,
            ]);
    }
}
