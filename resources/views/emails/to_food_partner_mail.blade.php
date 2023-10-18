@component('mail::message')
<h1 style="text-align: center">ShaQ Express Partnerships</h1>

<img src="{{asset('partner/images/shaq_food.png')}}" width="50%" height="50%" style="margin-left:20%;">

Hello {{$partner['business_name']}},<br>

Thank you for choosing to sell with ShaQ Express. We are delighted to onboard your restaurant or food business as a Partner.
We will contact you soon to take you through the final stages of the onboarding process.

https://partnership.shaqexpress.com/verify/{{ $token }}

Thanks,<br>
ShaQ Express Team.
@endcomponent
