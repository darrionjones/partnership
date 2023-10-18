<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ToVerifiedVendorMail extends Mailable
{
  use Queueable, SerializesModels;

  public $partner;
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($partner)
  {
    $this->partner = $partner;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->markdown('emails.to_verified_vendor_mail')
    ->subject('ShaQ Express Partnership');;
  }
}
