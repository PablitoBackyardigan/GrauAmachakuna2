<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public function scores()
    {
        return $this->hasMany(\App\Models\ZoneScore::class);
    }

}
