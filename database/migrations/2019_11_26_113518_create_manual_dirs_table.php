<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManualDirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual_dirs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('目录名');
            $table->unsignedInteger('level')->comment('目录级数（最多三级） 0:一级 1:二级 2:三级');
            $table->unsignedInteger('parent_id')->comment('父级id，顶级为0');
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
        Schema::dropIfExists('manual_dirs');
    }
}
