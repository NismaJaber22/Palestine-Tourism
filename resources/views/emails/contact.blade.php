<x-mail::message>
    {{$email}}
# Contact form <span style="text-transform:capitalize">{{$name}}</span>

<h1 style="text-transform:capitalize">{{$title}}</h1>
<p>{{$msg}}</p>

<x-mail::button :url="''">
   visit us
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}

</x-mail::message>


