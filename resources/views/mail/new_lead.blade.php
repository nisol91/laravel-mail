@component('mail::message')
<h1>Nuovo messaggio da:</h1>
{{$lead->name}},{{$lead->email}}
<h2>Contenuto:</h2>
{{$lead->message}}
@endcomponent

