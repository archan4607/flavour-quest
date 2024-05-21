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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('ingredients_id');
            $table->boolean('contain_egg')->default(1)->comment('0=>true, 1=>false');
            $table->boolean('type')->default(0)->comment('0=>veg, 1=>non-veg');
            $table->enum('level', ['Easy', 'Normal', 'Difficult', 'Complex']);
            $table->string('name');
            $table->longText('instruction');
            $table->string('description');
            $table->longText('direction');
            $table->integer('serve');
            $table->string('preparation_time');
            $table->string('cooking_time');
            $table->boolean('status')->default(0)->comment('0=>published, 1=>un-published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
