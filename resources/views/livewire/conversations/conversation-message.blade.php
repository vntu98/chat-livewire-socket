<div class="d-flex mb-2">
    <div>
        <img src="{{ $message->user->present()->avatar }}" alt="" style="width: 35px;" class="rounded-circle mr-2">
    </div>
    <div>
        <div class="bg-light p-2 rounded">
            {{ $message->body }}
        </div>
        <span class="text-muted" style="font-size: 0.8rem">
            {{ $message->user->present()->name }}
        </span>
    </div>
</div>