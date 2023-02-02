<div>
    @if ($errors->any())
        <div class="alert alert-danger m-2" role="alert">
            @foreach ($errors->all() as $error)
                <li class="list-group-item">
                    {{ $error }}
                </li>
            @endforeach
        </div>
    @endif
</div>
