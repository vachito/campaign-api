<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['category','unit_price'])]
#[Hidden(['created_at','updated_at','deleted_at'])]
class TemplateMeta extends Model
{
    use SoftDeletes;

    public function campaigns(){
        return $this->hasMany(Campaign::class);
    }
}
