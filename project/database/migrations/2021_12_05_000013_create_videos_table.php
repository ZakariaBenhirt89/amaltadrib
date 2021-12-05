<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateVideosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'videos';
    /**
     * Run the migrations.
     * @table videos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 70)->nullable();
            $table->string('durartion', 45)->nullable();
            $table->text('file')->nullable();
            $table->integer('chefs_id');

            $table->index(["chefs_id"], 'fk_videos_chefs1_idx');


            $table->foreign('chefs_id', 'fk_videos_chefs1_idx')
                ->references('id')->on('chefs')
                ->onDelete('no action')
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
