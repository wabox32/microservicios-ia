<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class QRService
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
     * Create an instance of book using the books service
     * @return string
     */
    public function createQR($data)
    {
        return $this->performRequest('POST', '/api/v1/qr', $data);
    }


}
