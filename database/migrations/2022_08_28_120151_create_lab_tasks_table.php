<?php

use App\Models\LabQueue;
use App\Models\User;
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
        Schema::create('lab_tasks', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('index', unsigned: true);
            $table->string('title', 255);
            $table->string('description', 1024);
            $table->timestamp('deadline')->nullable();
            $table->foreignIdFor(LabQueue::class)->constrained();
            $table->foreignIdFor(User::class, 'creator_id')->constrained();
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
        Schema::dropIfExists('lab_tasks');
    }
};
