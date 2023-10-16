<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::create('messages', function (Blueprint $table) {
    $table->ulid('id');
    $table->string('content');
    $table->timestamps();
});
