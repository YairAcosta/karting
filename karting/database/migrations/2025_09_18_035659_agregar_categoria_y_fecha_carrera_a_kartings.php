<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarCategoriaYFechaCarreraAKartings extends Migration
{
    public function up()
    {
        Schema::table('kartings', function (Blueprint $table) {
            $table->string('categoria')->nullable()->after('tiempo');
            $table->date('fecha_carrera')->nullable()->after('categoria');
        });
    }

    public function down()
    {
        Schema::table('kartings', function (Blueprint $table) {
            $table->dropColumn(['categoria', 'fecha_carrera']);
        });
    }
}

