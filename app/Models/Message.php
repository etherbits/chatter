<?php

namespace App/Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Message extends Model {
    use HasUlids;

    public $timestamps = true;
}
