<?php

namespace App\Http\Controllers\darkos;

use App\Enums\MethodType;
use App\Http\Controllers\BaseController;
use App\Http\Requests\darkos\InterfaceHttpRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request AS HttpRequest;

class InterfaceHttpController extends BaseController
{
    /**
     * 发送Http请求
     * @param InterfaceHttpRequest $request
     */
    public function store(InterfaceHttpRequest $request)
    {
        $client = new Client();

        $data = array_column($request->request_params, 'value', 'name');
        switch ($request->method_type)
        {
            case MethodType::GET :
            case MethodType::DELETE :
                $data = ['query' => $data];
                break;

            case MethodType::POST :
            case MethodType::PUT :
            case MethodType::PATCH :
                $data = ['form_params' => $data];
                break;
        }

        $http = new HttpRequest(MethodType::getKey((int) $request->method_type), $request->host_address . $request->uri);

        $promise = $client->sendAsync($http, $data)->then(function ($response) {
            echo $response->getBody();
        });

        $promise->wait();
    }
}