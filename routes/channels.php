<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
use App\Models\Order;
use App\Models\User;

Broadcast::channel('chats.{chatId}', function (User $user, string $chatId) {
    return true;
});
