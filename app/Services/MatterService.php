<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class MatterService
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
    public function obtainMatters()
    {
        return $this->performRequest('GET', '/api/v1/matters');
    }

    /**
     * Create an instance of book using the books service
     * @return string
     */
    public function createMatter($data)
    {
        return $this->performRequest('POST', '/api/v1/matters', $data);
    }

    /**
     * Get a single book from the books service
     * @return string
     */
    public function obtainMatter($matters)
    {
        return $this->performRequest('GET', "/api/v1/matters/{$matters}");
    }

    /**
     * Edit a single book from the books service
     * @return string
     */
    public function editMatter($data, $matters)
    {
        return $this->performRequest('PUT', "/api/v1/matters/{$matters}", $data);
    }

    /**
     * Remove a single book from the books service
     * @return string
     */
    public function deleteMatter($matters)
    {
        return $this->performRequest('DELETE', "/api/v1/matters/{$matters}");
    }

}
