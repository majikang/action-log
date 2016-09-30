<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateActionLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string("uid")->comment("用户id");
            $table->string("username")->comment("姓名");
            $table->string("type","50")->comment("操作类型");
            $table->string("system",150)->comment("操作系统");
            $table->string("ip","50")->comment("操作者ip");
            $table->string("region",50)->comment("ip地区");
            $table->string("url",150)->comment('url');
            $table->string("content")->comment("操作描述");
            $table->string("TermType")->comment("终端型号");
            $table->string("TermVer")->comment("终端版本号");
            $table->string("TermIMEI")->comment("IMEI号");
            $table->string("TermID")->comment("终端ID号");
            $table->string("result")->comment("请求结果");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('action_log');
    }
}
