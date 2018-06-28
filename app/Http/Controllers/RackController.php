<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rack;
use App\Book;

class RackController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user');
    }

    /**
     * Show the all racks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $racks = Rack::where('archive', 0)->paginate(25);
            return view('pages.racks.main', ['racks'=>$racks]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Show books from a rack
     *
     * @return \Illuminate\Http\Response
     */
    public function getRackBooks($id)
    {
        try {
            $rack = Rack::where('id', $id)->where('archive', 0)->first();
            if($rack){
                return view('pages.racks.books', ['rack'=>$rack]);
            }
            return redirect()->back()->withErrors('Rack not found');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Search books
     *
     * @return \Illuminate\Http\Response
     */
    public function searchBooks(Request $request)
    {
        try {
            $filters = $request->all();
            $books = Book::getBooksWithRack($filters);

            if($books){
                return view('pages.racks.book_results', ['books'=>$books]);
            }
            return redirect()->back()->withErrors('Rack not found');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

}
