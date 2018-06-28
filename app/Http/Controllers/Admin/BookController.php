<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rack;
use App\Book;

use App\Http\Requests\StoreBook;

class BookController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles all methods related to Books in Dashboard.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show All Racks
     *
     * @return void
     */
    protected function index()
    {
        try {
            $books = Book::where('archive', 0)->get();
            $books->each(function($book, $key){
                $actions = '<a href="'.route('admin.books.edit', ['id' => $book->id]).'"><span class="label label-warning m-l-5">View</span></a>';

                $actions .= '<a href="'.route('admin.books.delete', ['id' => $book->id]).'" class="sa-warning"><span class="label label-danger m-l-5">Delete</span></a>';

                return $book['actions'] = $actions;
            });
            return view('pages.admin.books.main', ['books'=>$books->toJson()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Show View to create a Book
     *
     * @return void
     */
    protected function create()
    {
        try {
            $rackSelect = Rack::where('archive', 0)->pluck('name', 'id')->toArray();
            return view('pages.admin.books.create', ['rackSelect'=>$rackSelect]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Store a Book
     *
     * @return void
     */
    protected function store(StoreBook $request)
    {
        try {
            $inputs = $request->except('_token');

            // validate rack books
            $rack = Rack::where('id', $inputs['rack_id'])->first();
            if($rack->books->count() == 10){
                return redirect()->back()->withInput()->withErrors('Rack has reached maximum number of books. Please select another rack.');
            }

            $res = Book::create($inputs);
            if($res){
                return redirect()->route('admin.books.index')->with(['success'=>true, 'message'=>'Rack create successfully!']);
            }
            return redirect()->back()->withErrors('Failed to store rack.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Show a rack for edit
     *
     * @return void
     */
    protected function edit($id)
    {
        try {
            $book = Book::where('id', $id)->where('archive', 0)->first();
            if($book) {
                return view('pages.admin.books.create', ['rack' => $book]);
            }
            return redirect()->back()->withErrors('Failed to get the rack with id '.$id);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Update a Book
     *
     * @return void
     */
    protected function update(StoreBook $request, $id)
    {
        try {
            $inputs = $request->except('_token');
            // validate the name is unique
            $books = Book::where('name', $inputs['name'])->get();
            if($books->count() > 0) return redirect()->back()->withInput()->withErrors('Rack name already exists');

            $book = Book::where('id', $id)->where('archive', 0)->update($inputs);
            if($book) {
                return redirect()->route('admin.books.index');
            }
            return redirect()->back()->withErrors('Failed to get the rack with id '.$id);

            return view('pages.admin.dashboard');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Delete a Book
     *
     * @return void
     */
    protected function delete($id)
    {
        try {
            $book = Book::where('id', $id)->where('archive', 0)->update(['archive'=>1]);
            if($book) {
                return redirect()->route('admin.books.index');
            }
            return redirect()->back()->withErrors('Failed to delete the rack with id '.$id);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

}
