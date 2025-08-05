<?php

use App\Models\Book;
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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('rating');
            $table->foreignId('book_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
