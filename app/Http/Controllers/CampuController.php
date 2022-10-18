<?php

namespace App\Http\Controllers;

use App\Services\CampuService;
use App\Services\LoungeService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class CampuController extends Controller
{
    use ApiResponser;

    public $campuService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CampuService  $campuService)
    {
        $this->campuService = $campuService;
    }

    public function index()
    {
        return $this->successResponse($this->campuService->obtainCampus());
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->campuService->createCampu($request->all()), Response::HTTP_CREATED);
    }

    public function show($campus)
    {
        return $this->successResponse($this->campuService->obtainCampus($campus));
    }

    public function update(Request $request, $campus)
    {
        return $this->successResponse($this->campuService->editCampu($request->all(), $campus));
    }

    public function destroy($campus)
    {
        return $this->successResponse($this->campuService->deleteCampu($campus));
    }


}
