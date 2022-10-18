<?php

namespace App\Http\Controllers;

use App\Services\AssistService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class AssistController extends Controller
{
    use ApiResponser;

    public $assistService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AssistService $assistService)
    {
        $this->assistService = $assistService;
    }

    public function index($code)
    {

        return $this->successResponse($this->assistService->obtainAssists($code));
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->assistService->createAssist($request->all()), Response::HTTP_CREATED);
    }

}
