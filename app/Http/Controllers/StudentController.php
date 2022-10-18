<?php

namespace App\Http\Controllers;

use App\Services\LoungeService;
use App\Services\StudentService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use ApiResponser;

    public $loungeService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService  $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        return $this->successResponse($this->studentService->obtainStudents());
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->studentService->createStudent($request->all()), Response::HTTP_CREATED);
    }

    public function show($students)
    {
        return $this->successResponse($this->studentService->obtainStudent($students));
    }

    public function update(Request $request, $students)
    {
        return $this->successResponse($this->studentService->editStudent($request->all(), $students));
    }

    public function destroy($lounges)
    {
        return $this->successResponse($this->studentService->deleteStudent($lounges));
    }


}
