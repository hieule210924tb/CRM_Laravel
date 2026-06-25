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
        Schema::create('arranges', function (Blueprint $table) {
            $table->id();
            $table->date('day')->nullable();
            $table->string('name_arranges')->nullable();
            $table->string('name_customer')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_customer')->nullable();
            $table->string('name')->nullable();
            $table->foreignId('sale_user_id')->constrained('users')->cascadeOnUpdate()->nullable();
            $table->foreignId('part_id')->constrained('parts')->cascadeOnUpdate()->nullable();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnUpdate()->nullable();
            $table->string('account_social')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->nullable();
            $table->foreignId('support_user_id')->constrained('users')->cascadeOnUpdate()->nullable();
            $table->unsignedTinyInteger('type_arrange')->default(0)->comment('0:mới, 1:cũ');
            $table->unsignedTinyInteger('result')->default(0)->comment('0:hoàn thành, 1:chưa bốc,2: fail');
            $table->integer('reason_fail')->nullable();
            $table->integer('total_arrange')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arranges');
    }
};