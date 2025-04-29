<x-mail::message>
# Hello {{ $clientName }},

Thank you for reaching out to us. We appreciate your message and value your time.

**Our Response:**
{{ $replayMessage }}
If you have any further questions, please don't hesitate to reach out.

<x-mail::button :url="config('app.url')">
Visit Our Website
</x-mail::button>

Best regards,<br>
**{{ config('app.name') }}** Team
{{ config('app.url') }}
</x-mail::message>
