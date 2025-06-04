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
        Schema::rename('pedido_produtos', 'pedidos_produtos');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('pedidos_produtos', 'pedido_produtos');
    }
};
