<?php

namespace App\Http\Controllers;
use App\Services\BucketService;
use Illuminate\Http\Request;

class BucketController extends Controller
{
    public function __construct(private BucketService $service) {}

    public function index()
    {
        try {
            $buckets = $this->service->all();
            return $this->successResponse($buckets);
        } catch (\Exception $e) {
            return $this->errorResponse('Error al obtener los bolsones', 500, $e);
        }
    }
}
