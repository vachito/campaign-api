<?php

namespace App\Services;

use App\Models\Bucket;

class BucketService
{
    public function all()
    {
        return Bucket::all();
    }
}
