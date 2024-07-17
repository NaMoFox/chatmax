<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['description'];

    public function products()
    {
        return $this->hasMany(Product::class, 'id');
    }
    
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
