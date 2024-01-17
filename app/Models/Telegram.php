<?php

namespace App\Models;


class Telegram extends NexusModel
{
    protected $fillable = ['userid', 'telegramid'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function telegramid()
    {
        return $this->belongsTo(User::class, 'telegramid');
    }
}
