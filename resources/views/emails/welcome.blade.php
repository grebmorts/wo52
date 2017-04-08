@component('mail::message')
# Tervetuloa!

Jotain sössötystä tähän.

@component('mail::button', ['url' => ''])
Siirry palveluun
@endcomponent

Terveisin,<br>
{{ config('app.name') }}
@endcomponent
