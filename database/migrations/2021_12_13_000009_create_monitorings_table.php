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
            $table->string('code', 100)->nullable()->default('0000');
            $table->string('title', 70)->nullable();
            $table->text('basic_recipes')->nullable()->default('...');
            $table->string('duration', 100)->nullable()->default('...');
            $table->string('result', 100)->nullable()->default('...');
            $table->tinyInteger('status')->comment("0:inprogress,1:graduated,2:not graduated")->ddefault("0");
            $table->unsignedBigInteger('students_id');
            $table->unsignedBigInteger('services_id');
            $table->timestamps();

            $table->index(["students_id"], 'fk_monitoring_students1_idx');
            $table->index(["services_id"], 'fk_monitoring_services1_idx');

            $table->foreign('students_id', 'fk_monitoring_students1_idx')->references('id')->on('students')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('services_id', 'fk_monitoring_services1_idx')->references('id')->on('services')->onDelete('cascade')->onUpdate('no action');
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
