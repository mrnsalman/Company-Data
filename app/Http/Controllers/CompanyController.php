<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Industry;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            if(Auth::user()->role == 'user') {
                $user = User::find(Auth::user()->id);
                $companies = $user->company()->paginate(10);
                $industries = Industry::all();
                return view('pages.allCompanies',[
                    'companies' => $companies,
                    'industries' => $industries,
                ]);
            }
            else {
                $companies = Company::paginate(10);
                $industries = Industry::all();
                return view('pages.allCompanies',[
               'companies' => $companies,
               'industries' => $industries,
           ]);
            }  
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industries = Industry::all();
       return view('pages.addCompany',[
           'industries' => $industries,
       ]);
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
            'user_id'=>'required',
            'company_name'=>'required|string|max:255',
            'industry_id'=>'required',
            'company_address'=>'required|string|max:255',
            'contactPerson_name'=>'required|string|max:255',
            'Designation'=>'required|string|max:255',
            'contact_number'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'unique_id'=>'required|string|max:255|unique:companies,unique_id,'.$request->unique_id,
            'strength'=>'required|string|max:255',
            'loopholes'=>'required|string|max:255',
            'scopes'=>'required|string|max:255',
        ],[
          'unique_id.unique' => 'This company has already added!'  
        ]);

        $company = Company::create([
            'user_id'=> $request->user_id,
            'company_name'=> $request->company_name,
            'industry_id'=> $request->industry_id,
            'company_address'=> $request->company_address,
            'contactPerson_name'=> $request->contactPerson_name,
            'Designation'=> $request->Designation,
            'contact_number'=> $request->contact_number,
            'email'=> $request->email,
            'unique_id'=> $request->unique_id,
            'strength'=> $request->strength,
            'loopholes'=> $request->loopholes,
            'scopes'=> $request->scopes,
        ]);

        Toastr::success('Company Added Successfully', 'SUCCESS', ["positionClass" => "toast-top-right"]);

        return Redirect::route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company = Company::find($company->id);
        return view('pages.companyDetails',[
            'company' => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::find($company->id);
        $industries = Industry::all();
        return view('pages.editCompany',[
            'company' => $company,
            'industries' => $industries,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $this->validate($request, [
            'user_id'=>'required',
            'company_name'=>'required|string|max:255',
            'industry_id'=>'required',
            'company_address'=>'required|string|max:255',
            'contactPerson_name'=>'required|string|max:255',
            'Designation'=>'required|string|max:255',
            'contact_number'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'unique_id'=>'required|string|max:255|unique:companies,unique_id,'.$request->id,
            'strength'=>'required|string|max:255',
            'loopholes'=>'required|string|max:255',
            'scopes'=>'required|string|max:255',
        ],[
          'unique_id.unique' => 'This company has already added!'  
        ]);

        $company = Company::find($company->id);
        $company->user_id = $request->user_id;
        $company->company_name = $request->company_name;
        $company->industry_id = $request->industry_id;
        $company->company_address = $request->company_address;
        $company->contactPerson_name = $request->contactPerson_name;
        $company->Designation = $request->Designation;
        $company->contact_number = $request->contact_number;
        $company->email = $request->email;
        $company->unique_id = $request->unique_id;
        $company->strength = $request->strength;
        $company->loopholes = $request->loopholes;
        $company->scopes = $request->scopes;
        $company->save();

        Toastr::success('Company Updated Successfully', 'SUCCESS', ["positionClass" => "toast-top-right"]);

        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company = Company::findOrFail($company->id);

        $company->delete();

        Toastr::error('Company Deleted!!', 'SUCCESS', ["positionClass" => "toast-top-right"]);
    
        return Redirect::route('companies.index');
    }

    public function Search(Request $request)
    {

        if ($request->field == '0' && $request->search)
        {
            $companies = Company::where('company_name','like','%'.$request->search.'%')
            ->paginate(10);

            $industries = Industry::all();

            return view('pages.searchCompanies',[
                'companies' => $companies,
                'industries' => $industries,
            ]);

        }

        elseif ($request->field && $request->search == null)
        {
            $companies = Company::where('industry_id',$request->field)
            ->paginate(10);

            $industries = Industry::all();

            return view('pages.searchCompanies',[
                'companies' => $companies,
                'industries' => $industries,
            ]);
        }

        else
        {
            $companies = Company::where('company_name','like','%'.$request->search.'%')
                ->where('industry_id',$request->field)
                ->paginate(10);

                $industries = Industry::all();

                return view('pages.searchCompanies',[
                    'companies' => $companies,
                    'industries' => $industries,
                ]);
         
        }
    }
}
