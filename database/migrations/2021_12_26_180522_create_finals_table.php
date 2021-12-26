<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('No')->nullable();
            $table->string('Name');
            $table->date('Year_Built')->nullable();
            $table->text('created_by')->nullable();
            $table->float('price',16,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finals');
    }
}
