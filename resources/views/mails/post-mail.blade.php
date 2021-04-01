@component('mail::message')
# Nuovo post!

L'autore {{$post->author->info->name}} ha pubblicato un nuovo post dal titolo {{$post->title}}.

@component('mail::button', ['url' => ''])
Leggilo qui
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
