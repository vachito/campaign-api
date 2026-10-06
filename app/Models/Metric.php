<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable('quantity','status_message_id','campaign_id')]
#[Hidden('created_at','updated_at','deleted_at')]
class Metric extends Model
{
    use SoftDeletes;

    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }

    public function status_message(){
        return $this->belongsTo(StatusMessage::class);
    }
}
