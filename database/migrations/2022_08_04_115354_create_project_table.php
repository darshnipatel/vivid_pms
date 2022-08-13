<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->Integer('client_id');
            $table->Integer('rate');
            $table->string('type')->nullable();;
            $table->Integer('employee_id');
            $table->string('technology')->nullable();
            $table->string('priority')->nullable();
            $table->text('attached_files')->nullable();
            $table->text('description')->nullable();
            $table->text('status')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project');
    }
};
