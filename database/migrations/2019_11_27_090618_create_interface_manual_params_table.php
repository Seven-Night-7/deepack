<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterfaceManualParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interface_manual_params', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('manual_id')->comment('接口文档id');
            $table->unsignedTinyInteger('type')->comment('参数来源 1:请求 2:响应');
            $table->string('name')->comment('参数名');
            $table->unsignedTinyInteger('field_type')->comment('类型 1:int 2:string');
            $table->string('desc')->nullable()->comment('说明');
            $table->unsignedTinyInteger('is_required')->default(0)->comment('是否必选');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interface_manual_params');
    }
}
