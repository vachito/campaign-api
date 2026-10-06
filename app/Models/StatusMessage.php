<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable('uid','name')]
#[Hidden('created_at','updated_at','deleted_at')]
class StatusMessage extends Model
{
    use SoftDeletes;

    public function metrics(){
        return $this->hasMany(Metric::class);
    }
}
