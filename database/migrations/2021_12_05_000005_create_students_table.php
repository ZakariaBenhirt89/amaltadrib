<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateStudentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'students';
    /**
     * Run the migrations.
     * @table students
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->text('avatar')->nullable();
            $table->string('fname', 45)->nullable();
            $table->string('lname', 45)->nullable();
            $table->string('phone', 45)->nullable();
            $table->string('birthday', 45)->nullable();
            $table->string('level', 45)->nullable();
            $table->string('gardian_number', 45)->nullable();
            $table->string('family_situation', 45)->nullable();
            $table->integer('number_of_children')->nullable();
            $table->string('cin_number', 45)->nullable();
            $table->text('adress')->nullable();
            $table->string('email', 150)->nullable();
            $table->text('password')->nullable();
            $table->longText('more_details')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->unique(["email"], 'email_UNIQUE');
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
