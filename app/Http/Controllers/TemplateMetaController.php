<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TemplateMetaService;
class TemplateMetaController extends Controller
{
    public function __construct(Protected TemplateMetaService $service){}
    
    public function index(){
        try {
            $templateMeta = $this->service->all();
            
            return $this->successResponse($templateMeta, 'template ok');
        } catch (\Exception $e) {
            return $this->errorResponse('Error al obtener las categorías de meta', 500, $e);
        }
    }
}
