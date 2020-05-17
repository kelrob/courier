<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Package;
use Illuminate\Support\Facades\File;

class QovexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {

        $userName  = Auth::user()->name;
        $packages = Package::all();

        if ($request->get('id')) {
            $id = $request->get('id');
            $detail = Package::where('id', $id)->first();
        } else {
            $detail = '';
        }

        if(view()->exists($request->path())){
            return view($request->path(), compact('userName', 'packages', 'detail', 'tracker'));
        }
        return view('pages-404');
    }

    public function authPages(Request $request) {
        if(view()->exists('auth.'.$request->path())){
            return view('auth.'.$request->path());
        }
        return view('pages-404');
    }

    public function checkStatus(){
        if(!Auth::check()) {
            return abort(404);
        }
        return false;
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function submitPackage(Request $request) {

        if ($request->file('image')) {

            # Start processing image upload
            $package = $request->file('image');
            $dir =  $_SERVER['DOCUMENT_ROOT'];
            $original_directory = "$dir/img/packages";
            $month_year = strtolower(date('F-Y'));
            $target_directory = $original_directory . '/' . $month_year;

            # Check if directory exist or make one
            if (!is_dir($target_directory)) {
                File::makeDirectory($target_directory, $mode = 0777, true, true);
            }

            //dd($logo);
            $filename = rand(1000,1000000) . $package->getClientOriginalName();
            $dbPackageName = $month_year . '/' .$filename;

            $uploadFile = $package->move($target_directory, $filename);
            if ($uploadFile) {
                $request['package_image'] = $dbPackageName;
                $request['tracking_key'] = randomString();
                $request->except(['_token', 'submit']);

                Package::create($request->all());
                return redirect(url('index'));
            }
        } else {
            $request['tracking_key'] = randomString();
            $request->except(['_token', 'submit']);
            Package::create($request->all());
            return redirect(url('index'));
        }
    }

    public function editPackage(Request $request, $id) {
        $package  = Package::where('id', $id)->first();

        $package->sender_address = $request->sender_address;
        $package->status = $request->status;
        $package->save();

        return true;
    }

    public function deletePackage($id) {
        $package  = Package::where('id', $id)->delete();
        return redirect(url('index'));
    }

    public function trackPackage(Request $request) {
        if ($request->get('key')) {
            $key = $request->get('key');
            $tracker = Package::where('tracking_key', $key)->first();

            return view('track-key');
        } else {
            $tracker = '';
        }
    }
}
