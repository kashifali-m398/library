<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRack;
use App\Rack;

class RackController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles all methods related to Racks in Dashboard.
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
            $racks = Rack::where('archive', 0)->get();
            $racks->each(function($rack, $key){
                $actions = '<a href="'.route('admin.racks.edit', ['id' => $rack->id]).'"><span class="label label-warning m-l-5">View</span></a>';

                $actions .= '<a href="'.route('admin.racks.delete', ['id' => $rack->id]).'" class="sa-warning"><span class="label label-danger m-l-5">Delete</span></a>';

                return $rack['actions'] = $actions;
            });
            return view('pages.admin.racks.main', ['racks'=>$racks->toJson()]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Show View to create a Rack
     *
     * @return void
     */
    protected function create()
    {
        try {
            return view('pages.admin.racks.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Store a Rack
     *
     * @return void
     */
    protected function store(StoreRack $request)
    {
        try {
            $inputs = $request->except('_token');
            $res = Rack::create($inputs);
            if($res){
                return redirect()->route('admin.racks.index')->with(['success'=>true, 'message'=>'Rack create successfully!']);
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
            $rack = Rack::where('id', $id)->where('archive', 0)->first();
            if($rack) {
                return view('pages.admin.racks.create', ['rack' => $rack]);
            }
            return redirect()->back()->withErrors('Failed to get the rack with id '.$id);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Update a Rack
     *
     * @return void
     */
    protected function update(StoreRack $request, $id)
    {
        try {
            $inputs = $request->except('_token');
            // validate the name is unique
            $racks = Rack::where('name', $inputs['name'])->get();
            if($racks->count() > 0) return redirect()->back()->withInput()->withErrors('Rack name already exists');

            $rack = Rack::where('id', $id)->where('archive', 0)->update($inputs);
            if($rack) {
                return redirect()->route('admin.racks.index');
            }
            return redirect()->back()->withErrors('Failed to get the rack with id '.$id);

            return view('pages.admin.dashboard');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Delete a Rack
     *
     * @return void
     */
    protected function delete($id)
    {
        try {
            $rack = Rack::where('id', $id)->where('archive', 0)->update(['archive'=>1]);
            if($rack) {
                return redirect()->route('admin.racks.index');
            }
            return redirect()->back()->withErrors('Failed to delete the rack with id '.$id);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

}
