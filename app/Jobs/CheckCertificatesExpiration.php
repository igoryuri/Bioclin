<?php

namespace App\Jobs;

use App\Mail\CertificatesExpiring;
use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CheckCertificatesExpiration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//    /**
//     * Create a new job instance.
//     */
//    public function __construct()
//    {
//        //
//    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $today = Carbon::today();
        $thirtyDaysLater = $today->copy()->addDay(30);

        $expiringCertificates = Certificate::where('is_active', true)
            ->where('expiration_date', '<=', $thirtyDaysLater)
            ->where('expiration_date', '>', $today)
            ->get();

        if ($expiringCertificates->isNotEmpty()) {
            Mail::to('igor.silva@bioclin.com.br')->send(new CertificatesExpiring($expiringCertificates));
        }
    }
}
