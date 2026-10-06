<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['uuid', 'name', 'dispatch_date', 'dispatch_template', 'total_db', 'bucket_id', 'template_meta_id'])]
#[Hidden(['created_at', 'updated_at', 'deleted_at'])]
class Campaign extends Model
{
    use SoftDeletes;

    public function template_meta()
    {
        return $this->belongsTo(TemplateMeta::class);
    }

    public function bucket()
    {
        return $this->belongsTo(Bucket::class);
    }

    public function metrics()
    {
        return $this->hasMany(Metric::class);
    }

    public function public_report(): MorphOne
    {
        return $this->morphOne(PublicReport::class, 'reportable');
    }
}
