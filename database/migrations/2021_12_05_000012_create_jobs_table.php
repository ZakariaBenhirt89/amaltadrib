<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateJobsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'jobs';
    /**
     * Run the migrations.
     * @table jobs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('start', 100)->nullable()->default('...');
            $table->string('end', 100)->nullable()->default('...');
            $table->string('provider', 100)->nullable()->default('...');
            $table->text('address')->nullable();
            $table->unsignedBigInteger('students_id');
            $table->timestamps();

            $table->index(["students_id"], 'fk_jobs_students1_idx');


            $table->foreign('students_id', 'fk_jobs_students1_idx')
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
