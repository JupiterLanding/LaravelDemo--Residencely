<x-mail::message>
# New Property Created

Price: {{ $property->price }} <br>
Name: {{ $property->title }} <br>
Description: {{ $property->description }} <br>


<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
