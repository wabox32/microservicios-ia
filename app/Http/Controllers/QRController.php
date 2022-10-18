<?php

namespace App\Http\Controllers;

use App\Services\LoungeService;
use App\Services\QRService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class QRController extends Controller
{
    use ApiResponser;

    public $qrService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(QRService $qrService)
    {
        $this->qrService = $qrService;
    }


    public function store(Request $request)
    {
        return $this->successResponse($this->qrService->createQR($request->all()), Response::HTTP_CREATED);
    }

}
