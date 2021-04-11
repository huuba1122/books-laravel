<?php


namespace App\Http\Repositories;


use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BookRepository extends Repository
{
    function getAll()
    {
        return Book::orderBy('id','DESC')->paginate(5);
    }

    function getInstance(): Book
    {
        return new Book();
    }

    function findById($id)
    {
        return Book::findOrFail($id);
    }

    function store($book , $authorsId)
    {
        DB::beginTransaction();
        try {
            $book->save();
            $book->authors()->sync($authorsId);
            DB::commit();
//            Session::flash('success','create successfully ');
        }catch (\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    function update($book, $authorsId)
    {
        DB::beginTransaction();
        try {
            $book->update();
            $book->authors()->sync($authorsId);
            DB::commit();
//            Session::flash('success','update successfully');
        }catch (\Exception $exception){
            DB::rollBack();
//            Session::flash('error','update fail !!!');
        }
    }

    function delete($book)
    {
        DB::beginTransaction();
        try {
            $book->authors()->detach();
            Storage::disk('public')->delete($book->image);
            $book->delete();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
        }
    }

    function search($search)
    {
        return Book::where('name', 'LIKE', "%$search%" )->paginate(5);
    }

}
