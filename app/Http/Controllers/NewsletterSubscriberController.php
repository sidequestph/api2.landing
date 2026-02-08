<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use App\Mail\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class NewsletterSubscriberController extends Controller
{
    /**
     * Store a new newsletter subscriber.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            // Sanitize email input
            if ($request->has('email')) {
                $request->merge([
                    'email' => filter_var($request->input('email'), FILTER_SANITIZE_EMAIL)
                ]);
            }

            // Validate request
            $this->validate($request, NewsletterSubscriber::$rules);

            // Create subscriber
            $subscriber = NewsletterSubscriber::create([
                'email' => $request->input('email'),
                'last_email_sent' => \Carbon\Carbon::now(),
            ]);

            // Send email
            try {
                Mail::to($subscriber->email)->send(new NewsletterSubscription($subscriber));
                Log::info("Newsletter welcome email sent successfully to {$subscriber->email}");
            } catch (\Exception $e) {
                Log::error("Failed to send newsletter welcome email to {$subscriber->email}. Error: " . $e->getMessage());
                // We don't throw here to avoid failing the subscription if email fails, 
                // but we could if strict consistency is required.
                // Given the requirement "lastly we'll send an email", saving is prioritized.
            }

            return response()->json([
                'message' => 'Subscribed to newsletter successfully',
                'data' => $subscriber,
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'messages' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error("Failed to subscribe to newsletter. Error: " . $e->getMessage());
            return response()->json([
                'error' => 'Failed to subscribe',
                'message' => 'An error occurred while processing your request.',
            ], 500);
        }
    }

    /**
     * Unsubscribe a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unsubscribe(Request $request, $id)
    {
        if (!$request->hasValidSignature()) {
            abort(403, 'Invalid or expired unsubscribe link.');
        }

        $subscriber = NewsletterSubscriber::find($id);

        if ($subscriber) {
            $subscriber->delete();
            Log::info("Subscriber {$subscriber->email} (ID: {$id}) unsubscribed successfully.");
        }

        return view('emails.unsubscribed');
    }
}
