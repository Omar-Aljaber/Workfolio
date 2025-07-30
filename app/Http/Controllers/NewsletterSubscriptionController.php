<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterSubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:newsletter_subscriptions,email'
        ]);

        if ($validator->fails()) {
            return redirect("/projects")
                ->with('newsletter_error', $validator->errors()->first('email'))
                ->withInput();
        }

        NewsletterSubscription::create([
            'email' => $request->email,
            'is_active' => true
        ]);

        return redirect("/projects")
            ->with('newsletter_success', 'Thank you for subscribing to our newsletter!');
    }
}
