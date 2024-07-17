<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Welcome extends Model
{
    use HasFactory;
    protected $fillable = ['welcomereply', 'mediaPath', 'media_url'];

     // Mutator to save the full URL
     public function setMediaPathAttribute($value)
     {
         if ($value) {
             $this->attributes['mediaPath'] = $value;
             $this->attributes['media_url'] = url('storage/' . $value);
         }
     }

     public function team(): BelongsTo
     {
         return $this->belongsTo(Team::class);
     }
}

