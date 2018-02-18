<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{

    public function letter_type() {

        return $this->belongsTo('App\Letter_type');
    }
}
