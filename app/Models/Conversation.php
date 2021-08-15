<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_message_at'
    ];

    protected $dates = [
        'last_message_at'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->oldest();
    }

    public function messages()
    {
        return $this->hasMany(Message::class)
            ->latest();
    }
}
