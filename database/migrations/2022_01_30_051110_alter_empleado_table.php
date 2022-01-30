<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::table('empleado', function (Blueprint $table) {
            //
            //$table->integer('estado_residencia')->change();
        //});
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE empleado MODIFY estado_residencia INTEGER NOT_NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleado', function (Blueprint $table) {
            //
        });
    }
}
