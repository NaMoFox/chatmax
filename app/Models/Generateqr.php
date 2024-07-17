<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Generateqr extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'botfile', 'bot_qr'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function setTeamIdAttribute($value)
    {
        $this->attributes['team_id'] = $value;
        $this->attributes['botfile'] = 'bot' . $value;
        $this->attributes['bot_qr'] = 'chatmax.me/bot' . $value . '/qr.png';

    }
   
}
