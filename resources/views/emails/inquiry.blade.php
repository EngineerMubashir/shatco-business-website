<h2>New Inquiry Received</h2>

<p><strong>Name:</strong> {{ $inquiry->name }}</p>
<p><strong>Email:</strong> {{ $inquiry->email }}</p>
<p><strong>Phone:</strong> {{ $inquiry->phone ?? 'N/A' }}</p>

@if($inquiry->service)
    <p><strong>Service Interested:</strong> {{ $inquiry->service->title }}</p>
@endif

<p><strong>Message:</strong></p>
<p>{{ $inquiry->message }}</p>

<hr>
<p>This message was submitted from your website contact form.</p>
