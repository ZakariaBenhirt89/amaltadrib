<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateMonitoringsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'monitorings';
    /**
     * Run the migrations.
     * @table monitoring
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('title', 70)->nullable();
            $table->string('start', 45)->nullable();
            $table->string('end', 45)->nullable();
            $table->string('place', 150)->nullable();
            $table->boolean('accepted')->nullable()->default(false);
            $table->text('service')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('students_id');

            $table->index(["students_id"], 'fk_monitoring_students1_idx');


            $table->foreign('students_id', 'fk_monitoring_students1_idx')
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
