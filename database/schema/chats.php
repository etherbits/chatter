<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::create('chats', function (Blueprint $table) {
    $table->ulid("id");
    $table->string('name');
    $table->boolean('is_group');
    $table->timestamps();
});
