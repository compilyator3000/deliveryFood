<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId("category_id")->constrained()->onDelete("cascade");
            $table->integer("cafe_id");
            $table->string("title");
            $table->integer("weight");
            $table->integer("price");
            $table->float("discount")->default(0);
            $table->boolean("active")->default(1);
            $table->text("description");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food');
    }
}
