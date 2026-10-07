<?php

namespace App\Services;

use App\Models\TemplateMeta;

class TemplateMetaService
{
    public function all()
    {
        return TemplateMeta::all();
    }
}
