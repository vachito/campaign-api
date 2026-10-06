<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignStoreRequest;
use App\Http\Requests\CampaignUpdateRequest;
use App\Http\Resources\CampaignsResource;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Services\CampaignService;

class CampaignController extends Controller
{
    public function __construct(protected CampaignService $service){}

    public function index(){
        try {
            $campaings = $this->service->all();
            return $this->successResponse(CampaignsResource::collection($campaings), 'Campañas obtenidas correctamente', 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Hubo un error al obtener las campañas',500,$th);
        }
    }

    public function store(CampaignStoreRequest $request){
        $validated = $request->validated();
        
        try {
            $campaing = $this->service->create($validated);
            return $this->successResponse($campaing, 'Campaña almacenada correctamente', 201);
        } catch (\Throwable $th) {
            return $this->errorResponse('Hubo un error al guardar la campaña',500,$th);
        }
    }

    public function show(Campaign $campaign){
        try {
            return $this->successResponse($campaign, 'Campaña obtenida correctamente', 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Hubo un error al obtener la campaña',500,$th);
        }
    }

    public function update(Campaign $campaign, CampaignUpdateRequest $request){
        $validated = $request->validated();
    
        try {
            $newcampaing = $this->service->update($campaign, $validated);
            return $this->successResponse($newcampaing, 'Campaña actualizada correctamente', 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Hubo un error al guardar la campaña',500,$th);
        }
    }

    public function destroy(Campaign $campaign){
        try {
            $this->service->delete($campaign);
            return $this->successResponse(null, 'Campaña eliminada correctamente', 200);
        } catch (\Throwable $th) {
            return $this->errorResponse('Hubo un error al eliminar la campaña',500,$th);
        }
    }
}
