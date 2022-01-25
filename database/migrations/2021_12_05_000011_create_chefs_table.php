<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateChefsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'chefs';
    /**
     * Run the migrations.
     * @table chefs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->text('avatar')->nullable();
            $table->string('fname', 70)->nullable();
            $table->string('lname', 70)->nullable();
            $table->string('birthday', 45)->nullable();
            $table->string('gender', 45)->nullable();
            $table->text('adress')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('centers_id');
            $table->timestamps();
            $table->index(["centers_id"], 'fk_chefs_centers_idx');


            $table->foreign('centers_id', 'fk_chefs_centers_idx')
                ->references('id')->on('centers')
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
