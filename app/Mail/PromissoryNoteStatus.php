<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PromissoryNoteStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $note;
    public $subject;
    public $messageBody;

    public function __construct($note, $subject, $messageBody)
    {
        $this->note = $note;
        $this->subject = $subject;
        $this->messageBody = $messageBody;
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->view('email.promissoryStatus')
                    ->with([
                        'note' => $this->note,
                        'messageBody' => $this->messageBody,
                    ]);
    }
}
