<?php

namespace App\Http\Controllers\darkos;

use App\Enums\StatusCode;
use App\Http\Controllers\BaseController;
use App\Models\ManualDir;

class ManualDirController extends BaseController
{
    /**
     * 三级目录列表
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $dirs = ManualDir::withThreeLevel()->get();

        return $this->response(StatusCode::SUCCESS, $dirs);
    }
}
