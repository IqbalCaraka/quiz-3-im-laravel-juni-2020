<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->bigIncrements('artikelId');
            $table->string('judul')->nullable();
            $table->text('isi')->nullable();
            $table->string('slug')->nullable();
            $table->string('tag')->nullable();
            $table->unsignedBigInteger('userId')->nullable();
            $table->foreign('userId')->references('userId')->on('user');
            $table->timestamp('dibuat')->useCurrent();;
            $table->timestamp('diupdate')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('artikel');
    }
}
