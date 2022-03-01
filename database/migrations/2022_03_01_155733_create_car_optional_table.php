<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarOptionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_optional', function (Blueprint $table) {
            $table->unsignedBigInteger('car_id')->nullable();
            $table->foreign('car_id')
                ->references('id')
                ->on('cars');

            $table->unsignedBigInteger('optional_id')->nullable();
            $table->foreign('optional_id')
                ->references('id')
                ->on('optionals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('car_optional_optional_id_foreign');
        $table->dropForeign('car_optional_car_id_foreign');
        Schema::dropIfExists('car_optional');
    }
}
