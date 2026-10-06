<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable('password','expired')]
#[Hidden('created_at','updated_at','deleted_at')]
class PublicReport extends Model
{
    use SoftDeletes;

    public function reportable() : MorphTo {
        return $this->morphTo();
    }
}
