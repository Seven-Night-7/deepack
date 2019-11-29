<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterfaceManualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interface_manuals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('dir_id')->comment('所在目录id');
            $table->string('name')->comment('接口名');
            $table->string('uri')->comment('资源标志符');
            $table->unsignedTinyInteger('method_type')->comment('请求方式 1:get 2:post 3:put 4:patch 5:delete');
            $table->string('desc')->nullable()->comment('简要描述');
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
        Schema::dropIfExists('interface_manuals');
    }
}
