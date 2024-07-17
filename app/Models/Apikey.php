<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Apikey extends Model
{
    use HasFactory;
    protected $fillable = ['service_name', 'api_key'];
    
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function setTeamIdAttribute($value)
    {
        $this->attributes['team_id'] = $value;
        $this->attributes['service_name'] = 'api_key_ia' . $value;
    }
   
}
