<?php

namespace App\Http\Controllers;

use App\Services\LoungeService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class LoungeController extends Controller
{
    use ApiResponser;

    public $loungeService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LoungeService  $loungeService)
    {
        $this->loungeService = $loungeService;
    }

    public function index()
    {
        return $this->successResponse($this->loungeService->obtainLounges());
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->loungeService->createLounge($request->all()), Response::HTTP_CREATED);
    }

    public function show($lounges)
    {
        return $this->successResponse($this->loungeService->obtainLounges($lounges));
    }

    public function update(Request $request, $lounges)
    {
        return $this->successResponse($this->loungeService->editLounge($request->all(), $lounges));
    }

    public function destroy($lounges)
    {
        return $this->successResponse($this->loungeService->deleteLounge($lounges));
    }


}
