<?php
use Illuminate\Support\Facades\Broadcast;

Broadcast::routes();
Broadcast::channel('chat', function ($user) {
        return [
        'name' => $user->name,
        'email' => $user->email,
        'image' => $user->image
    ];
});
