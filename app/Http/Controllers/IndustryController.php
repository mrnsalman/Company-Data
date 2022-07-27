<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Industry;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class IndustryController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $industries = Industry::paginate(10);
       return view('pages.allIndustry',[
           'industries' => $industries,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.addIndustry');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'industry_name'=>'required|string|max:255|unique:industries',
        ]);

        $industry = Industry::create([
            'industry_name' => $request->industry_name,
        ]);

        Toastr::success('Industry Added Successfully', 'SUCCESS', ["positionClass" => "toast-top-right"]);

        return redirect('/industries');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function show(Industry $industry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function edit(Industry $industry)
    {
        $industry = Industry::find($industry->id);
        return view('pages.editIndustry',[
            'industry' => $industry,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Industry $industry)
    {
        $this->validate($request, [
            'industry_name'=>'required|string|max:255|unique:industries,industry_name,'.$request->id,
        ]);

        $industry = Industry::find($request->id);
        
        $industry->industry_name = $request->industry_name;
        $industry->save();

        Toastr::success('Industry Updated Successfully', 'SUCCESS', ["positionClass" => "toast-top-right"]);

        return redirect('/industries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Industry  $industry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Industry $industry)
    {
        $industry = Industry::findOrFail($industry->id);
        $industry->delete();

        Toastr::error('Industry Deleted!!', 'SUCCESS', ["positionClass" => "toast-top-right"]);
    
        return Redirect::route('industries.index');
    }
}
