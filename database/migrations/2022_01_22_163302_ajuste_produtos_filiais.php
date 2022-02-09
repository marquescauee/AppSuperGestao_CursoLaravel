<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiais', function(Blueprint $table) {
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        Schema::create('produto_filiais', function(Blueprint $table) {
            $table->id();
            $table->foreignId('filial_id')->constrained('filiais');
            $table->foreignId('produto_id')->constrained('produtos');
            $table->double('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();
        });

        Schema::table('produtos', function(Blueprint $table) {
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function(Blueprint $table) {
            $table->double('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        Schema::dropIfExists('produto_filiais');

        Schema::dropIfExists('filiais');
    }
}
