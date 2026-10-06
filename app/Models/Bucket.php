<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable('uid','organizational_unit','assignment_date','core_marketing_messages','state')]
#[Hidden('created_at','updated_at','deleted_at')]
class Bucket extends Model
{
    use SoftDeletes;

    public function campaigns(){
        return $this->hasMany(Campaign::class);
    }

    public function public_report(): MorphOne{
        return $this->morphOne(PublicReport::class, 'reportable');
    }
}
