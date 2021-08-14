<form action="#" wire:submit.prevent="reply">
    <div class="form-group mb-0">
        <textarea rows="3" class="form-control" wire:model="body"></textarea>
    </div>

    <button type="submit">Send</button>
</form>