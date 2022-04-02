<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatchedpodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watched_podcasts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('students_id');
            $table->unsignedBigInteger('podcasts_id');

            $table->index(["podcasts_id"], 'fk_students_has_podcasts1_idx');

            $table->index(["students_id"], 'fk_students_has_podcasts_students1_idx');


            $table->foreign('students_id', 'fk_students_has_podcasts_students1_idx')
                ->references('id')->on('students')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('podcasts_id', 'fk_students_has_podcasts_podcasts1_idx')
                ->references('id')->on('podcasts')
                ->onDelete('cascade')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('watched_podcasts');
    }
}
