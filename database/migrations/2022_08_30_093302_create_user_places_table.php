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
        Schema::create('user_places', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users')->constrained();
            $table->foreignId('lab_queue_id')->references('id')->on('lab_queues')->constrained();
            $table->foreignId('lab_task_id')->references('id')->on('lab_tasks')->constrained();
            $table->primary(['user_id', 'lab_queue_id', 'lab_task_id']);
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
        Schema::dropIfExists('user_places');
    }
};
