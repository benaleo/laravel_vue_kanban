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
        Schema::create('columns', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->uuid('project_id')->nullable();
            $table->boolean('is_delete')->default(false);
            $table->timestamps();
        });

        Schema::table('columns', function (Blueprint $table) {
            if (Schema::hasTable('projects')){
                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('columns');
    }
};
