<?php

namespace App\Mail;

use App\Models\Partner;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PartnerJoined extends Mailable
{
  use Queueable, SerializesModels;


  public $partner, $token;
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct( $partner, $token)
  {
    $this->partner = $partner;
    $this->token = $token;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->markdown('emails.partner_joined')
      ->subject('A Vendor Joined');
  }
}
