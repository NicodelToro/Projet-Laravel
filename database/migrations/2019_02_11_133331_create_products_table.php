<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id'); // clé primaire
            $table->string('title', 100); // VARCHAR 100
            $table->text('description')->nullable(); // TEXT NULL
            $table->decimal('price');
            $table->enum('size', array('46', '48', '50', '52'));
            $table->string('url_image');
            $table->enum('status', array('publié', 'brouillon'));
            $table->enum('code', array("soldes", "new" ));
            $table->string('reference');
            $table->timestamps(); // timestamps 
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
