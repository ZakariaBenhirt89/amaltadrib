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
            $table->string('title', 70)->nullable();
            $table->decimal('salary', 8, 2)->nullable();
            $table->string('position', 70)->nullable();
            $table->string('provider', 70)->nullable();
            $table->text('location')->nullable();
            $table->string('supervisor', 70)->nullable();
            $table->string('supervisor_email', 150)->nullable();
            $table->string('supervisor_phone', 45)->nullable();
            $table->string('start', 45)->nullable();
            $table->string('end', 45)->nullable();
            $table->string('contract_type', 70)->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('students_id');

            $table->index(["students_id"], 'fk_jobs_students1_idx');


            $table->foreign('students_id', 'fk_jobs_students1_idx')
                ->references('id')->on('students')
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
