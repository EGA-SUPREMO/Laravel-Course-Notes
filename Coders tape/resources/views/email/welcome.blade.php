@component('mail::message')
# Welcome to this exiting new project, {{ $costumer -> name}}

We kindly ask you to edit your profile because you clearly doesn't know how to sign up properly.

YOU have errrors in your name or email(We don't know how you see this, but that isn't our problem), please edit your and only your data, because we give admin-like access to everyone!

@component('mail::button', ['url' => "/costumers/{{$costumer -> id}}"])
Click here in the fastest time as possible!
@endcomponent

Thanks but no thanks,<br>
{{ config('app.name') }}
@endcomponent
