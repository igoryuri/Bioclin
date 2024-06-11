<?php

namespace App\Livewire;

use App\Mail\EmailContato;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SendEmail extends Component
{
    #[Validate('required')]
    public $name, $email, $telephone, $sector, $description;

    #[Validate('nullable|file|mimes:doc,docx,pdf,txt,odt|max:15360|min:5')]
    public $attach;

    public function send()
    {
        $request = [
            'name' => $this->name,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'sector' => $this->sector,
            'attach' => $this->attach,
            'description' => $this->description,
        ];

        $this->validate();

        if ($this->attach) {
            $file =$this->attach;
            dd(Mail::to($request->sector . '@bioclin.com.br')->send(new EmailContato($request, $file)));
        } else {
            dd(Mail::to($request->sector . '@bioclin.com.br')->send(new EmailContato($request)));
        }

        return redirect()->back()->with('status', 'E-mail enviado com sucesso!');
    }

    public function render()
    {
        return view('livewire.send-email');
    }
}
