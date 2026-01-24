<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
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
