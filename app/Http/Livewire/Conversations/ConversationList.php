<?php

namespace App\Http\Livewire\Conversations;

use App\Models\Conversation;
use Illuminate\Support\Collection;
use Livewire\Component;

class ConversationList extends Component
{
    public $conversations;

    public function mount(Collection $conversations)
    {
        $this->conversations = $conversations;
    }

    public function getListeners()
    {
        return [
            'echo-private:user.'. auth()->id() . ',Conversations\\ConversationCreated' => 'prependConversationFromBroadcast',
            'echo-private:user.'. auth()->id() . ',Conversations\\ConversationUpdated' => 'updateConversationFromBroadcast',
        ];
    }

    public function updateConversationFromBroadcast($payload)
    {
        $id = $payload['conversation']['id'];

        $this->conversations = $this->conversations->find($id)->fresh();
    }

    public function prependConversation($id)
    {
        $this->conversations->prepend(Conversation::find($id));
    }

    public function prependConversationFromBroadcast($payload)
    {
        $this->prependConversation($payload['conversation']['id']);
    }

    public function render()
    {
        return view('livewire.conversations.conversation-list');
    }
}
