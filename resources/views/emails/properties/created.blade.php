<x-mail::message>
# New Property Created

Price: ${{ number_format($property->price, 2) }} <br>
Name: {{ $property->title }} <br>
Description: {{ $property->description }} <br>


<x-mail::button :url="''">
    View Property
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
