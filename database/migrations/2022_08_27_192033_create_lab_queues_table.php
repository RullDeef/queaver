<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_queues', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->tinyInteger('semester', unsigned: true);
            $table->tinyInteger('labs_count', unsigned: true);
            $table->tinyInteger('priority_policy', unsigned: true);
            $table->boolean('group_index_indifference');
            $table->foreignIdFor(User::class, 'creator_id')->constrained('users');
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
        Schema::dropIfExists('lab_queues');
    }
};
