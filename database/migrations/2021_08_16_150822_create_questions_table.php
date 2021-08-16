<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('question');
            $table->string('trueAnswer');
            $table->string('falseAnswer1');
            $table->string('falseAnswer2');
            $table->string('falseAnswer3');
            $table->text('description');
            $table->text('quran');
            $table->text('quranTranslate');
            $table->text('hadits');
            $table->text('haditsTranslate');
            $table->text('kitab');
            $table->text('kitabTranslate');
            $table->string('type');
            $table->string('mode');
            $table->string('asset');
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
        Schema::dropIfExists('questions');
    }
}
