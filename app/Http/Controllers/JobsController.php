<?php

namespace App\Http\Controllers;

use App\Mail\JobsEmail;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::query()->where('is_active', true)->get();
        return view('home.job', compact('jobs'));
    }

    public function show($id)
    {
        $data = Job::find($id);
        if (!$data) {
            return response()->json(['error' => 'Data not found'], 404);
        }
        return response()->json($data);
    }

    public function sendEmail(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'description' => ['required'],
            'file' => ['nullable', 'file', 'mimes:pdf'],
            'category' => ['required'],
        ]);

        try {
            if ($request->hasFile('file')) {
                $file = time() . "-" . $request->file('file')->getClientOriginalName();
                $request->file('file')->move('curriculo', $file);
                $response = Mail::to('igor.silva@bioclin.com.br')->send(new JobsEmail($request, $file));

                if (!$response) {
                    return back()->with('status', 'Something went wrong');
                }
                Storage::delete(public_path('curriculo/' . $file));
            } else {
                $response = Mail::to('igor.silva@bioclin.com.br')->send(new JobsEmail($request));
                if (!$response) {
                    return back()->with('status', 'Something went wrong');
                }
            }
        } catch (\Exception $exception) {
            return back()->with('status', $exception->getMessage());
        }
        return redirect()->back()->with('status', 'E-mail enviado com sucesso!');
    }


}
