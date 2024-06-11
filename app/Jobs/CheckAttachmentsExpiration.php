<?php

namespace App\Jobs;

use App\Mail\AttachmentsExpiring;
use App\Models\Attachment;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CheckAttachmentsExpiration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $today = Carbon::today();
        $thirtyDaysLater = $today->copy()->addDays(30);

        $expiringAttachments = Attachment::query()
            ->where('expiration_date', '<=', $thirtyDaysLater)
            ->where('expiration_date', '>', $today)
            ->with('product')
            ->get();

        ds($expiringAttachments);

        if ($expiringAttachments->isNotEmpty()) {
           Mail::to('igor.silva@bioclin.com.br')->send(new AttachmentsExpiring($expiringAttachments));
        }
    }
}
