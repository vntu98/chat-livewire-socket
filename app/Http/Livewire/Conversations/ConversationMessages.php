<?php

namespace App\Http\Livewire\Conversations;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Collection;
use Livewire\Component;

class ConversationMessages extends Component
{
    public $messages;

    public $conversationId;

    public function mount(Conversation $conversation, Collection $messages)
    {
        $this->messages = $messages;
        $this->conversationId = $conversation->id;
    }

    public function getListeners()
    {
        return [
            'message.created' => 'prependMessage',
            "echo-private:conversations.{$this->conversationId},Conversations\\MessageAdded" => 'prependMessageFromBroadcast'
        ];
    }

    public function prependMessage($id)
    {
        $this->messages->prepend(Message::find($id));
    }

    public function prependMessageFromBroadcast($payload)
    {
        $this->prependMessage($payload['message']['id']);
    }

    public function render()
    {
        return view('livewire.conversations.conversation-messages');
    }
}
