<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chatia extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'estado'];

    public function prompts()
    {
        return $this->hasMany(Prompt::class, 'id');
    }
    public function team(): BelongsTo

    {
        return $this->belongsTo(Team::class);
    }
}
