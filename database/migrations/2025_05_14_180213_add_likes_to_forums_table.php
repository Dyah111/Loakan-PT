<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('forum_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('forum_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['user_id', 'forum_id']); // 1 user hanya bisa like 1 kali per forum
        });
    }

    public function down()
    {
        Schema::table('forums', function (Blueprint $table) {
            $table->dropColumn('likes');
        });
    }

};
