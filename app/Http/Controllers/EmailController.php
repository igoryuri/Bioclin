<?php

namespace App\Http\Controllers;

use App\Mail\EmailContato;
use App\Models\Email;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\File;

class EmailController extends Controller
{

    public function index()
    {
        return view('home.email');
    }

    public function enviarEmail(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'telephone' => ['required'],
            'sector' => ['required'],
            'attach' => ['nullable', 'file', 'mimes:doc,docx,pdf,txt,odt'],
            'description' => ['required'],
        ]);

        if ($request->hasFile('attach')) {
            $file = $request->file('attach');
            Mail::to($request->sector . '@bioclin.com.br')->send(new EmailContato($request, $file));

        } else {
            Mail::to($request->sector . '@bioclin.com.br')->send(new EmailContato($request));
        }

        Email::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'sector' => $request->sector,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('status', 'E-mail enviado com sucesso!');

    }

}
