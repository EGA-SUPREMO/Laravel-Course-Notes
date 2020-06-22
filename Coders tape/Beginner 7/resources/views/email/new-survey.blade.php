@component('mail::message')
# Introduction

# someone gave feedback!!!!!!Y1 im prod of htis

the id is: {{ $survey-> id }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
