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
        Schema::table('workout_histories', function (Blueprint $table) {
            // テーブル設計変更
            $table->foreignId('workout_menu_id')->after('user_id')->constrained()->onDelete('cascade');
            $table->renameColumn('total_time', 'workout_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workout_histories', function (Blueprint $table) {
            $table->renameColumn('workout_time', 'total_time');
            $table->dropForeign(['workout_menu_id']);
            $table->dropColumn('workout_menu_id');
        });
    }
};
