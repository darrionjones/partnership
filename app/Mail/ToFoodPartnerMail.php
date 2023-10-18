<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ToFoodPartnerMail extends Mailable
{
  use Queueable, SerializesModels;

  public $partner, $token;
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($partner,$token)
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
    return $this->markdown('emails.to_food_partner_mail')
      ->subject('ShaQ Express Partnership');
  }
}
