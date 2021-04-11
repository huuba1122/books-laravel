<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBookViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
      CREATE VIEW book_views AS select books.id, books.name,books.image,
                    books.price,books.category_id, authors.name as author_name,
                    authors.id AS author_id, categories.name AS category_name FROM books
            JOIN categories ON books.category_id = categories.id
            JOIN author_book ON books.id = author_book.book_id
            JOIN authors ON author_book.author_id = authors.id
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_views');
    }
}
