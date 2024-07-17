<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Closesession extends Model
{
    use HasFactory;

    protected $fillable = ['phone_number', 'received_welcome', 'last_interaction'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
