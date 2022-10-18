<?php

namespace App\Http\Controllers;

use App\Services\LoungeService;
use App\Services\MatterService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class MatterController extends Controller
{
    use ApiResponser;

    public $matterService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MatterService  $matterService)
    {
        $this->matterService = $matterService;
    }

    public function index()
    {
        return $this->successResponse($this->matterService->obtainMatters());
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->matterService->createMatter($request->all()), Response::HTTP_CREATED);
    }

    public function show($matters)
    {
        return $this->successResponse($this->matterService->obtainMatter($matters));
    }

    public function update(Request $request, $matters)
    {
        return $this->successResponse($this->matterService->editMatter($request->all(), $matters));
    }

    public function destroy($matters)
    {
        return $this->successResponse($this->matterService->deleteMatter($matters));
    }


}
