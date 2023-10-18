<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorInstructions extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $attachment = public_path() . '/files/VendorAgreementShaQ.docx';
        return $this->from('rhoda.folie@shaqexpress.com', 'Rhoda from ShaQ Express')
            ->view('emails.vendor-instructions')
            ->replyTo('rhoda.folie@shaqexpress.com', 'Rhoda Folie')
            ->subject('Instructions from ShaQ Express')
            ->attach($attachment, [
                'as' => 'shaqexpress_vendor_contract.docx',
                'mime' => 'application/docx',
            ]);
    }
}
