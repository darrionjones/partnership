@component('mail::message')
<h1 style="text-align: center">A Food Vendor Joined</h1>

{{$partner['business_name']}} has submitted details for food vendor on-boarding.
https://partnership.shaqexpress.com/verify/{{ $token }}
Thanks,<br>
ShaQ Express Team.
@endcomponent
