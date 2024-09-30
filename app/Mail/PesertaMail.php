<?php

namespace App\Mail;

use PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\UserPendaftaran;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class PesertaMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $pendaftaran;
    public $registrationNumber;
    public $user;
    public function __construct($pendaftaran, $registrationNumber, $user)
    {
        $this->pendaftaran = $pendaftaran;
        $this->registrationNumber = $registrationNumber;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Peserta Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'pdf.registration',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function build()
    {
        $pdf = PDF::loadView('pdf.registration', [
            'registrationNumber' => $this->registrationNumber,
            'user' => $this->user,
            'pendaftaran' => $this->pendaftaran,
            'date' => now()->format('d-m-Y'),
        ]);
        $fileName = "{$this->user->nama_lengkap}_bukti_pendaftaran.pdf";
        $filePath = public_path('upload/bukti_pendaftaran/' . $fileName);
        file_put_contents($filePath, $pdf->output());
        $userPendaftaran = UserPendaftaran::where('user_id', $this->user->id)->first();

        if ($userPendaftaran) {

            $userPendaftaran->file_bukti = $fileName;
        } else {

            $userPendaftaran = new UserPendaftaran();
            $userPendaftaran->user_id = $this->user->id;
            $userPendaftaran->file_bukti = $fileName;
        }

        $userPendaftaran->save();

        return $this->subject('Bukti Pendaftaran')
                    ->view('emails.peserta')
                    ->attachData($pdf->output(), $fileName, [
                        'mime' => 'application/pdf',
                    ]);
    }
    public function attachments(): array
    {
        return [];
    }
}
