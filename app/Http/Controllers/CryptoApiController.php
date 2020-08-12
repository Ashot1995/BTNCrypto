<?php

namespace App\Http\Controllers;

use App\Service\CryptoApiService;
use App\Status\Status;

class CryptoApiController extends Controller
{
    protected $services;

    /**
     * CryptoApiController constructor.
     * @param CryptoApiService $service
     * @author Ashot Gharakeshishyan
     */
    public function __construct(CryptoApiService $service)
    {
        $this->services = $service;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @author Ashot Gharakeshishyan
     */
    public function getDataFromApi()
    {
        try {
            return response()->json($this->services->getDataFromApi(), Status::SUCCESS);
        } catch (\ErrorException $error) {
            throw new \ErrorException('Error');
        }
    }
}
