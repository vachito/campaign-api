<?php

namespace App\Services;

use App\Models\StatusMessage;

class StatusMessageService
{
    public function all()
    {
        return StatusMessage::all();
    }
}
