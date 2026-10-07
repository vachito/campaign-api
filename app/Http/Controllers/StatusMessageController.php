<?php

namespace App\Http\Controllers;
use App\Services\StatusMessageService;
use Illuminate\Http\Request;

class StatusMessageController extends Controller
{
    public function __construct(Protected StatusMessageService $service){}
    
    public function index(){
        try {
            $statusMessages = $this->service->all();
            
            return $this->successResponse($statusMessages, 'status messages ok');
        } catch (\Exception $e) {
            return $this->errorResponse('Error al obtener los estados de mensajes', 500, $e);
        }
    }
}
