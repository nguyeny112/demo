
@component('mail::message')
# Welcome to SMP Shop
Hello {{ $user->name }}

Welcome to our SMP Shop, hope you enjoying our services. 
Have a nice day.

@component('mail::button', ['url' => route('public.index.index')])
Visit our Shop
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
