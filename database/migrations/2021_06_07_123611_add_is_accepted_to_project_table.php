<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsAcceptedToProjectTable extends Migration
{
    public function up(){
        Schema::table('projects', function (Blueprint $table) {
            $table->tinyInteger('approved')->default(0);
        });
    }

    public function down(){
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('approved');
        });
    }
}
