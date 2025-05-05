<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        //adding motivo_contatos_id col
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //assigning motivo_contato as the id for motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //creating the fk and removing motivo_contato col
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });
        
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
};
