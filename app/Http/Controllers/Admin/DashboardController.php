<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rack;
use App\Book;
use App\User;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles all methods related to Admin Dashboard.
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
     * Show Admin Dashboard
     *
     * @return void
     */
    protected function index()
    {
        try {
            $racksCount = Rack::where('archive', 0)->get()->count();
            $booksCount = Book::where('archive', 0)->get()->count();
            $usersCount = User::get()->count();
            return view('pages.admin.dashboard', ['racksCount'=>$racksCount, 'booksCount'=>$booksCount, 'usersCount'=>$usersCount]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

}
