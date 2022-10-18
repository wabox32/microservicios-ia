<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class CampuService
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
    public function obtainCampus()
    {
        return $this->performRequest('GET', '/api/v1/campus');
    }

    /**
     * Create an instance of book using the books service
     * @return string
     */
    public function createCampu($data)
    {
        return $this->performRequest('POST', '/api/v1/campus', $data);
    }

    /**
     * Get a single book from the books service
     * @return string
     */
    public function obtainCampu($campus)
    {
        return $this->performRequest('GET', "/api/v1/campus/{$campus}");
    }

    /**
     * Edit a single book from the books service
     * @return string
     */
    public function editCampu($data, $campus)
    {
        return $this->performRequest('PUT', "/api/v1/campus/{$campus}", $data);
    }

    /**
     * Remove a single book from the books service
     * @return string
     */
    public function deleteCampu($lounges)
    {
        return $this->performRequest('DELETE', "/api/v1/campus/{$campus}");
    }

}
