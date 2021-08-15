<?php

namespace App\Http\Livewire\Conversations;

use Livewire\Component;

class ConversationCreate extends Component
{
    public $users = [];

    public $body = '';

    public function addUser($user)
    {
        $this->users[] = $user;
    }

    public function render()
    {
        return view('livewire.conversations.conversation-create');
    }
}
