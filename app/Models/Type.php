<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Type extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasOne(User::class);
    }
}
