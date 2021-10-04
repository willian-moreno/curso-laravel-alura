<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Listar/Adicionar/Alterar

        // Na primeira vez, no Linux, rodar: sudo apt-get install php-sqlite3
        // Depois rodar: php artisan migrate (Para criar as tabelas)

        // Schema::create('series', function (Blueprint $table) {
        //     $table->string('nome');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Excluir

        # Schema::drop('series');
        # Schema::dropIfExists('series');
    }
}
