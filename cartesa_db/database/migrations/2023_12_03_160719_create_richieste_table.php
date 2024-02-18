<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('richieste', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('telephone');
            $table->string('city');
            $table->integer('cap');
            $table->string('description');
            $table->float('budget');
            $table->unsignedBigInteger('user_id'); //user that has accepted the request.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->boolean('isAccepted')->default(False);
            $table->datetime('accepted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
