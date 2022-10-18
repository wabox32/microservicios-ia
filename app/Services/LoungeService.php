<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class LoungeService
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
    public function obtainLounges()
    {
        return $this->performRequest('GET', '/api/v1/lounges');
    }

    /**
     * Create an instance of book using the books service
     * @return string
     */
    public function createLounge($data)
    {
        return $this->performRequest('POST', '/api/v1/lounges', $data);
    }

    /**
     * Get a single book from the books service
     * @return string
     */
    public function obtainLounge($lounges)
    {
        return $this->performRequest('GET', "/api/v1/lounges/{$lounges}");
    }

    /**
     * Edit a single book from the books service
     * @return string
     */
    public function editLounge($data, $lounges)
    {
        return $this->performRequest('PUT', "/api/v1/lounges/{$lounges}", $data);
    }

    /**
     * Remove a single book from the books service
     * @return string
     */
    public function deleteLounge($lounges)
    {
        return $this->performRequest('DELETE', "/api/v1/lounges/{$lounges}");
    }

}
