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

    public $documents; // Change to handle multiple documents
    public $nomEtudiant;

    public function __construct($documents, $nomEtudiant)
    {
        // Expect an array of documents (files)
        $this->documents = $documents;
        $this->nomEtudiant = $nomEtudiant;
    }

    public function build()
    {
        // Start building the email
        $email = $this->view('emails.document_envoye')
                      ->subject('Votre document demandé')
                      ->with([
                          'nomEtudiant' => $this->nomEtudiant,
                      ]);

        // Loop through each document (file) and attach it to the email
        foreach ($this->documents as $document) {
            if ($document instanceof \Illuminate\Http\UploadedFile) {
                $email->attach($document->getRealPath(), [
                    'as' => $document->getClientOriginalName(),
                    'mime' => $document->getMimeType(),
                ]);
            }
        }

        return $email;
    }
}