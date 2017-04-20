@component('mail::message')
# Thanks for buying at our shop

Hope you enjoy our service, here is our billing address:
<br>
**Bank ID:** 123456789
<br>
**Bank:** Dong A Bank
<br>
**Owner Account:** Le Vien Thuong 
<br>
**Bảo Kim :** levienthuong@gmail.com 
<hr>

_Contact:_ **0935579194** or Just reply to this Email Address.

@component('mail::button', ['url' =>  route('public.profile.show',['id'=>$order->id]).'?email='.$order->useremail,'color'=>'green'])
View and track your Order
@endcomponent

_Thanks,<br>
{{ config('app.name') }}
@endcomponent
