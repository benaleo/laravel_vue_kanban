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
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->foreignUuid('column_id')->nullable()->references('id')->on('columns')->nullOnDelete();
            $table->foreignUuid('project_id')->nullable()->references('id')->on('projects')->nullOnDelete();
            $table->foreignUuid('created_by')->nullable()->references('id')->on('users')->nullOnDelete();
            $table->boolean('is_deleted')->default(false);
            $table->boolean('is_archived')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
