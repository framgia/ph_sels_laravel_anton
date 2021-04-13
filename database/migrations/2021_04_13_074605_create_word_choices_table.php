<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_choices', function (Blueprint $table) {
            $table->primary(['word_id','choice_id']);
            $table->foreignId('word_id');
            $table->foreignId('choice_id');
            $table->foreignId('correct_choice_id')->nullable();

            $table->foreign('word_id')
                ->references('id')
                ->on('words')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('choice_id')
                ->references('id')
                ->on('choices')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('correct_choice_id')
                ->references('id')
                ->on('choices')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('word_choices');
    }
}
