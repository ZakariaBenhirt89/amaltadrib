<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateInternshipsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'internships';
    /**
     * Run the migrations.
     * @table internships
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('title', 70)->nullable();
            $table->string('provider', 70)->nullable();
            $table->string('start', 70)->nullable();
            $table->string('end', 70)->nullable();
            $table->string('supervisor', 45)->nullable();
            $table->string('supervisor_email', 150)->nullable();
            $table->string('supervisor_phone', 45)->nullable();
            $table->text('goals')->nullable();
            $table->text('guidlines')->nullable();
            $table->boolean('applied')->nullable()->default(false);
            $table->unsignedBigInteger('students_id');
            $table->timestamps();

            $table->index(["students_id"], 'fk_internships_students1_idx');


            $table->foreign('students_id', 'fk_internships_students1_idx')
                ->references('id')->on('students')
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
