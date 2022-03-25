<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdAlunoFieldTablePg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagamento', function (Blueprint $table) {
            $table->unsignedBigInteger('aluno_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagamento', function (Blueprint $table) {
            $table->unsignedBigInteger('aluno_id');
        });
    }
}
