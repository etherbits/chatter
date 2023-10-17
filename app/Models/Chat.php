<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Chat extends Model {
    use HasUlids;

    public $timestamps = true;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
