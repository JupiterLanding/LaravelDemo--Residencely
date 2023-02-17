<div class="m-2">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('users.profile') }}">
                Profile
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('users.vouchers') }}">
                Vouchers
            </a>
        </li>
        <li class="nav-item my-2">
            <a class="btn btn-primary position-relative" href="{{ route('users.messages') }}">
                Inbox
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    @if (auth()->user()->messages()->count() > 0)
                        {{ auth()->user()->messages()->count() }} +
                    @endif
                </span>
            </a>
        </li>
    </ul>
</div>