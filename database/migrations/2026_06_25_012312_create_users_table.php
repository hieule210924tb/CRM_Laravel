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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->date('birthday')->nullable();
            $table->unsignedTinyInteger('sex')->default(0)->comment('0: name, 1: nữ');
            $table->foreignId('part_id')->constrained('parts')->cascadeOnUpdate()->nullable();
            $table->foreignId('position_id')->constrained('positions')->cascadeOnUpdate()->nullable();
            $table->unsignedTinyInteger('type_work')->default(0)->comment('0: fulltime, 1: pastime');
            $table->foreignId('team_id')->constrained('teams')->cascadeOnUpdate()->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->unsignedTinyInteger('status')->default(0)->comment('0: đang làm, 1: nghỉ việc');
            $table->dateTime('start_day')->nullable();
            $table->dateTime('end_day')->nullable();
            $table->foreignId('type_account_id')->constrained('type_accounts')->cascadeOnUpdate()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};