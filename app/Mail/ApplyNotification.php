<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplyNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post_user, $apply_user, $product)
    {
        $this->post_user = $post_user;
        $this->apply_user = $apply_user;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.applyEmail')
                    ->from('match.info1234@gmail.com', 'match')
                    ->subject('案件への応募通知')
                    ->with(['post_user' => $this->post_user, 'apply_user' => $this->apply_user, 'product' => $this->product]);
    }
}
