<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AssistService
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
    public function obtainAssists($code)
    {
        return $this->performRequest('GET', '/api/v1/assists/'.$code);
    }

    /**
     * Create an instance of book using the books service
     * @return string
     */
    public function createAssist($data)
    {
        return $this->performRequest('POST', '/api/v1/assists', $data);
    }



}
