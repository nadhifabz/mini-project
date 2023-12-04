<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Blade;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if ($request->ajax()) {
        //     $data = Company::select('*');
        //     return DataTables::of($data)
        //     ->addIndexColumn()
        //     ->addColumn('action', function($row) {
        //         $btn = '<a href="#" class="btn btn-warning btn-sm">Edit</a>';
        //         return $btn;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
        // }
        return view('dashboard.companies.index', [
            "active" => "company",
        ]);
    }

    public function list()
    {
        $response = Company::select('*')->get();
        for ($i = 0; $i < $response->count(); $i++) {
            $response[$i]['action'] = Blade::render(
                '<a href="/companies/' . $response[$i]["id"] . '/edit" class="btn btn-warning btn-sm">Edit</a>
                <a href="/companies/' . $response[$i]["id"] . '" class="btn btn-success btn-sm">Detail</a>
                <form action="/companies/'. $response[$i]["id"] .'" method="POST" class="d-inline">
                @method("delete")
                @csrf
                <button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>'
            );
        }
        return json_encode($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.companies.create', [
            "active" => "company"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $validatedData = $request->validated();
        Company::create($validatedData);
        return redirect('/companies')->with('success', 'Added new company!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('dashboard.companies.show', [
            'active' => 'company',
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        // dd($company);
        return view('dashboard.companies.edit', [
            'company' => $company,
            'active' => 'company'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $validatedData = $request->validated();
        // $validatedData['id'] = auth()->user()->id;


        $getEmail = Company::where('email', $request->email)->first();
        // dd(isset($getEmail));
        if ($request->email != $company->email) {
            // if (isset($getEmail)) {
            //     return redirect('/companies/' . $company->id . '/edit')->with('error', 'Email is already in use!');
            // }
            $request->validate([
                'email' => 'required|unique:employees|email:dns'
            ]);
        }
        Company::where('id', $company->id)->update($validatedData);
        return redirect('/companies')->with('success', $company->name.' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        Company::where('id', $company->id)->delete();
        return redirect('/companies')->with('success', $company->name . " has been deleted!");
    }
}
