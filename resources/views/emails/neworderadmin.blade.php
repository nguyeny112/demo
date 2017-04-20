@component('mail::message')
# Received new order

Time: {{ $order->created_at }}
<br>
Customer: {{ $order->username }}
<br>
Amount: {{ $order->amount }}
<br>
Payment: {{ $order->payment->payment_name }}
<br>
Customer Phone: {{ $order->userphone }}
<br>
Customer Email: {{ $order->useremail }}
<hr>

@component('mail::button', ['url' =>  route('admin.order.show',['id'=>$order->id]),'color'=>'green'])
View order detail
@endcomponent

_Thanks,<br>
{{ config('app.name') }}
@endcomponent
