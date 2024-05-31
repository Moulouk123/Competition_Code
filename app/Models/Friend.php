<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Friend extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'friend_id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Récupère l'ami associé.
     */
    public function ami()
    {
        return $this->belongsTo(User::class,'friend_id');
    }
}