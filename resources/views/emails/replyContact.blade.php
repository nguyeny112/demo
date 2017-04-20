@component('mail::message')
# Dear, Mr(s) {{ $name }}

{{ $detail }}

@component('mail::button', ['url' => route('public.index.index')])
Visit Our Shop
@endcomponent

Best Regards,<br>
{{ config('app.name') }}
@endcomponent
