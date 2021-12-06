
@php
if(auth('company')->check()){
$link = route('company.email-verification.check', $user->verification_token);
}elseif(auth()->check()){
$link = route('email-verification.check', $user->verification_token);
}
@endphp
Click here to verify your account: <a href="{{ $link . '?email=' . urlencode($user->email) }}">{{ $link }}</a>
{{-- Click here to verify your account: <a href="{{ $link = route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) }}">{{ $link }}</a> --}}
