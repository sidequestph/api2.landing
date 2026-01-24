<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Mail\InquiryReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class LeadController extends Controller
{
    /**
     * Store a new lead.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, Lead::$rules);

            $data = $request->except(['ip_addr', 'last_email_sent']);
            $data['ip_addr'] = $request->ip();

            $lead = Lead::create($data);

            // Send email
            Mail::to($lead->email)->send(new InquiryReceived($lead));

            // Update last_email_sent
            $lead->update(['last_email_sent' => \Carbon\Carbon::now()]);

            return response()->json([
                'message' => 'Inquiry created successfully',
                'data' => $lead,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'messages' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create inquiry',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
