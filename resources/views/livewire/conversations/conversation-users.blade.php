<div>
    <div class="d-flex justify-content-between">
        <div class="font-weight-bold text-muted">
            @foreach ($users as $user)
                {{ $user->present()->name }}@if ($users->last() != $user), @endif
            @endforeach
        </div>

        <a href="#">Add someone</a>
    </div>
</div>
