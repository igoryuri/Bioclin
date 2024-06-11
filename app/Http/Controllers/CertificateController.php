<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today();
        $certificates = Certificate::where('is_active', true)->where('expiration_date', '>=', $today)->get();
        $page_certificates = Service::where('name', 'like', '%certi%')->get();

        return view('certificate.index', compact('certificates', 'page_certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(certificate $certificate)
    {
        //
    }
}
