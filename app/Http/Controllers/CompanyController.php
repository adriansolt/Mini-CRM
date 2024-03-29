<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $newCompany = $request->validated();

        if($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $name = time().'.'.$logo->getClientOriginalExtension();
            $dest = public_path('/images');
            $logo->move($dest, $name);
            $newCompany['logo'] = $name;
        }

        Mail::send('emails.companies.create', $newCompany, function ($message) use ($newCompany) {
            $message->from(auth()->user()->email, auth()->user()->name);

            $message->to($newCompany['email'])->subject(trans('company.email_subject_creation'));
        });
        $company = Company::create($newCompany);
        return redirect()->route('companies.show', $company);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $employees = $company->employees;
        return view('companies.show', compact('company', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $companyUpdated = $request->validated();
        if($request->hasFile('logo')) {
            $file = public_path('images/'.$company->logo);
            if($company->logo && is_file($file)) {
                Storage::delete($file);
            }
            $logo = $request->file('logo');
            $name = time().'.'.$logo->getClientOriginalExtension();
            $dest = public_path('/images');
            $logo->move($dest, $name);
            $companyUpdated['logo'] = $name;
        }

        $company->update($companyUpdated);
        return redirect()->route('companies.show', $company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return back();
    }
}
