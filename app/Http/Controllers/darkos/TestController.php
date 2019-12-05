<?php

namespace App\Http\Controllers\darkos;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class TestController extends BaseController
{
    //  列表
    public function index(Request $request)
    {
        return $this->response(0, $request->all());
    }

    //  详情
    public function show(Request $request, $id)
    {
        return $this->response(0, $request->all());
    }

    //  新增
    public function store(Request $request)
    {
        return $this->response(0, $request->post());
    }

    //  修改
    public function update(Request $request, $id)
    {
        return $this->response(0, $request->post());
    }

    //  删除
    public function destroy(Request $request, $id)
    {
        return $this->response(0, $request->all());
    }
}