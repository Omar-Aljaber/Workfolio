<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscription;
use App\Jobs\SendNewsletterBatch;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribersCount = NewsletterSubscription::active()->count();
        return view('newsletter.index', compact('subscribersCount'));
    }

    /**
     * Show the form for sending a newsletter.
     */
    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $activeSubscribers = NewsletterSubscription::readyForSending()->get();
        $batchSize = 10;
        $chunks = $activeSubscribers->chunk($batchSize);
        
        foreach ($chunks as $chunk) {
            SendNewsletterBatch::dispatch(
                $chunk->pluck('email')->toArray(),
                $request->subject,
                $request->message
            );
        }

        return back()->with('success', 'Newsletter sent successfully!');
    }
}
