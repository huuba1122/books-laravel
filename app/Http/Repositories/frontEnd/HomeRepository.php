<?php


namespace App\Http\Repositories\frontEnd;


use App\Models\Book;

class HomeRepository
{
        function getAll()
        {
            return Book::paginate(6);
        }
}
