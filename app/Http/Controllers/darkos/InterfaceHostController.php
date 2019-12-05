<?php

namespace App\Http\Controllers\darkos;

use App\Enums\StatusCode;
use App\Http\Controllers\BaseController;
use App\Http\Requests\darkos\InterfaceHostRequest;
use App\Models\InterfaceHost;

class InterfaceHostController extends BaseController
{
    /**
     * 列表
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->response(StatusCode::SUCCESS, InterfaceHost::all());
    }

    /**
     * 新增
     * @param InterfaceHostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(InterfaceHostRequest $request)
    {
        InterfaceHost::create($request->validated());

        return $this->response();
    }

    /**
     * 修改
     * @param InterfaceHostRequest $request
     * @param InterfaceHost $interfaceHost
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(InterfaceHostRequest $request, InterfaceHost $interfaceHost)
    {
        $interfaceHost->update($request->validated());

        return $this->response();
    }

    /**
     * 删除
     * @param InterfaceHost $interfaceHost
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(InterfaceHost $interfaceHost)
    {
        $interfaceHost->delete();

        return $this->response();
    }
}