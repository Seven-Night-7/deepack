<?php

namespace App\Http\Controllers\darkos;

use App\Enums\ParamOrigin;
use App\Enums\StatusCode;
use App\Http\Controllers\BaseController;
use App\Http\Requests\darkos\InterfaceManualRequest;
use App\Models\InterfaceManual;
use Illuminate\Support\Facades\DB;

class InterfaceManualController extends BaseController
{
    /**
     * 列表
     * @param InterfaceManualRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(InterfaceManualRequest $request)
    {
        $interfaceManuals = InterfaceManual::where('dir_id', $request->dir_id)->get();

        return $this->response(StatusCode::SUCCESS, $interfaceManuals);
    }

    /**
     * 详情
     * @param InterfaceManual $interfaceManual
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(InterfaceManual $interfaceManual)
    {
        return $this->response(StatusCode::SUCCESS, $interfaceManual);
    }

    /**
     * 新增
     * @param InterfaceManualRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(InterfaceManualRequest $request)
    {
        DB::beginTransaction();

        $interfaceManual = InterfaceManual::create($request->validated());

        //  生成请求和响应参数
        $interfaceManual->params()->createMany(array_each_merge($request->request_params, [
            'type' => ParamOrigin::REQUEST
        ]));
        $interfaceManual->params()->createMany(array_each_merge($request->response_params, [
            'type' => ParamOrigin::RESPONSE,
            'is_required' => 0
        ]));

        DB::commit();

        return $this->response();
    }

    /**
     * 修改
     * @param InterfaceManualRequest $request
     * @param InterfaceManual $interfaceManual
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(InterfaceManualRequest $request, InterfaceManual $interfaceManual)
    {
        DB::beginTransaction();

        $interfaceManual->update($request->validated());

        //  删除旧的请求和响应参数
        $interfaceManual->params()->forceDelete();

        //  生成新的请求和响应参数
        $interfaceManual->params()->createMany(array_each_merge($request->request_params, [
            'type' => ParamOrigin::REQUEST
        ]));
        $interfaceManual->params()->createMany(array_each_merge($request->response_params, [
            'type' => ParamOrigin::RESPONSE,
            'is_required' => 0
        ]));

        DB::commit();

        return $this->response();
    }

    /**
     * 删除
     * @param InterfaceManual $interfaceManual
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(InterfaceManual $interfaceManual)
    {
        DB::beginTransaction();

        $interfaceManual->params()->delete();

        $interfaceManual->delete();

        DB::commit();

        return $this->response();
    }
}
