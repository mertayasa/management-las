<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration{

    public function up(){
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('phone', 255);
            $table->string('address', 255);
            $table->date('start');
            $table->date('end');
            $table->text('detail');
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('progress')->default(0);
            $table->integer('assembly_charge')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('projects');
    }
}
