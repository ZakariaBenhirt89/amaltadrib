<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateStudentsHasVideosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'students_has_videos';
    /**
     * Run the migrations.
     * @table students_has_videos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('students_id');
            $table->unsignedBigInteger('videos_id');

            $table->index(["videos_id"], 'fk_students_has_videos_videos1_idx');

            $table->index(["students_id"], 'fk_students_has_videos_students1_idx');


            $table->foreign('students_id', 'fk_students_has_videos_students1_idx')
                ->references('id')->on('students')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('videos_id', 'fk_students_has_videos_videos1_idx')
                ->references('id')->on('videos')
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
        Schema::dropIfExists($this->tableName);
    }
}
