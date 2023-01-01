<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_list', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id');
            $table->string('nama_paket');
            $table->text('ket_paket');
            $table->string('hrg_paket');
            
            $table->timestamps();

            //relasi ke table package
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_list');
    }
}
