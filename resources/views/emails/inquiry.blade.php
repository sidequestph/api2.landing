<!DOCTYPE html>
<html>
<head>
    <title>New Inquiry Received</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>New Inquiry from {{ $lead->full_name }}</h2>
    
    <p><strong>Platform:</strong> {{ $lead->platform }}</p>
    <p><strong>Interest:</strong> {{ $lead->interest }}</p>
    <p><strong>Email:</strong> {{ $lead->email }}</p>
    <p><strong>IP Address:</strong> {{ $lead->ip_addr }}</p>
    
    <hr>
    
    <h3>Message:</h3>
    <p style="background-color: #f9f9f9; padding: 15px; border-radius: 5px;">
        {{ $lead->message }}
    </p>

    <p style="font-size: 12px; color: #888;">
        Received at: {{ $lead->created_at->format('F j, Y g:i A') }}
    </p>
</body>
</html>
