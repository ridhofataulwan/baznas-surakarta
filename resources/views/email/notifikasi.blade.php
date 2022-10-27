@component('mail::message')
# Important Notification

Hello {{$email}},

{{ $message }}.
Silahkan hubungi admin jika ada pertanyaan.
@component('mail::button', ['url' => 'https://wa.me/6285852535905'])
Hubungi Admin
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
