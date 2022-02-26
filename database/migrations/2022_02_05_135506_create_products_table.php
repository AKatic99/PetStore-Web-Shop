<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            //$table->bigInteger('kategorija_id');
            $table->string('naziv_proizvoda');
            $table->longText('opis');
            $table->string('cijena');
            $table->bigInteger('kolicina');
            $table->string('slika');
            $table->foreignId('category_id')->constrained('categories');

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
        Schema::dropIfExists('products');
    }
}
