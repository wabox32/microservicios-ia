<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class StudentService
{
    use ConsumesExternalService;

    /**
     * The base uri to be used to consume the books service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to be used to consume the books service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.assists.base_uri');
        $this->secret = config('services.assists.secret');
    }

    /**
     * Get the full list of books from the books service
     * @return string
     */
    public function obtainStudents()
    {
        return $this->performRequest('GET', '/api/v1/students');
    }

    /**
     * Create an instance of book using the books service
     * @return string
     */
    public function createStudent($data)
    {
        return $this->performRequest('POST', '/api/v1/students', $data);
    }

    /**
     * Get a single book from the books service
     * @return string
     */
    public function obtainStudent($students)
    {
        return $this->performRequest('GET', "/api/v1/students/{$students}");
    }

    /**
     * Edit a single book from the books service
     * @return string
     */
    public function editStudent($data, $students)
    {
        return $this->performRequest('PUT', "/api/v1/students/{$students}", $data);
    }

    /**
     * Remove a single book from the books service
     * @return string
     */
    public function deleteStudent($students)
    {
        return $this->performRequest('DELETE', "/api/v1/students/{$students}");
    }

}
