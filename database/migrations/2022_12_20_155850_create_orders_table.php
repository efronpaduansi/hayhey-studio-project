<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id');
            $table->string('nama_pemesan');
            $table->string('email_pemesan');
            $table->string('no_hp_pemesan');
            $table->string('package');
            $table->string('nama_paket');
            $table->string('ket_paket');
            $table->string('paket_tambahan')->nullable();
            $table->date('tgl_pelaksanaan');
            $table->string('lokasi_pelaksanaan');
            $table->string('alamat');
            $table->string('total_harga');
            $table->string('pembayaran');
            $table->string('keterangan')->nullable();
            $table->timestamps();

             //relasi ke table package
             $table->foreign('package_id')->references('id')->on('packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
