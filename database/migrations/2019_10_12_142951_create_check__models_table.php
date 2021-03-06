<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateCheckModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check__models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('item');
            $table->unsignedInteger('amount');
            $table->date('date')->useCurrent = true;
            });
    }
    /**
     * Reverse the migration
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check__models');
    }
}