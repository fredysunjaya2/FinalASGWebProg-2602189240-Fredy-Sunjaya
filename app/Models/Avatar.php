<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Avatar extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): HasMany {
        return $this->hasMany(User::class);
    }

    public function userAvatar(): HasMany {
        return $this->hasMany(UserAvatar::class);
    }
}
