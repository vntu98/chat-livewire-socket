<form action="" class="bg-white">
    <div class="p-4 border-bottom">
        <div class="mb-2 text-muted">
            Send to
            @foreach ($users as $index =>  $user)
                <a href="#" class="font-weight-bold">{{ $user['name'] }}</a>@if ($index + 1 !== Count($users)), @endif
            @endforeach
        </div>

        <div x-data="conversationCreateState()">
            <div class="form-group">
                <label for="user" class="sr-only">User</label>
                <input type="text" id="user" class="form-control" autocomplete="off" placeholder="Search users" x-on:input.debounce="search" x-ref="search">
            </div>

            <template x-for="user in suggestions" :key="user.id">
                <a href="#" x-on:click="addUser(user)" class="d-block" x-text="user.name"></a>
            </template>
        </div>
    </div>
    <div class="p-4 border-top">
        <div class="form-group">
            <label for="" class="sr-only">Message</label>
            <textarea rows="3" id="body" class="form-control" wire:model="body"></textarea>

            <button type="submit" class="btn btn-secondary btn-clock">
                Start conversation
            </button>
        </div>
    </div>
</form>

<script>
    function conversationCreateState() {
        return {
            suggestions: [],

            search(e) {
                fetch(`/api/search/users?q=${e.target.value}`)
                    .then(response => response.json())
                    .then((suggestions) => {
                        this.suggestions = suggestions
                    })
            },

            addUser(user) {
                @this.call('addUser', user)
                this.$refs.search.value = ''
                this.suggestions = []
            }
        }
    }
</script>