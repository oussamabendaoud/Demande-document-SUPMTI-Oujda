<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class DocumentEnvoye extends Mailable
{
    use Queueable, SerializesModels;

    public $document;
    public $nomEtudiant;

    public function __construct($document, $nomEtudiant)
    {
        $this->document = $document;
        $this->nomEtudiant = $nomEtudiant;
    }

    public function build()
    {
        return $this->view('emails.document_envoye')
                    ->subject('Votre document demandé')
                    ->attach($this->document->getRealPath(), [
                        'as' => $this->document->getClientOriginalName(),
                        'mime' => $this->document->getMimeType(),
                    ])
                    ->with([
                        'nomEtudiant' => $this->nomEtudiant,
                    ]);
    }
}