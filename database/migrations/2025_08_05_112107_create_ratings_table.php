<?php

use App\Models\Book;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('rating');
            $table->foreignId('book_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::table('ratings', function (Blueprint $table) {
            $table->index('book_id');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
