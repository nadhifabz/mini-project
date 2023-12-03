<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Company::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = array('response' => '', 'success' => false);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:companies|email:dns',
            'address' => 'required'
        ]);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            $company = Company::create($request->all());
            return response()->json([
                'message' => 'Company added',
                'data' => $company
            ], 201);
        }

        return $response;
    }


    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return $company;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $response = array('response' => '', 'success' => false);
        $rules = [
            'name' => 'required',
            'address' => 'required'
        ];
        if ($request->email != $company->email) {
            $rules['email'] = 'required|unique:companies|email:dns';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            $company->update($request->all());
            return response()->json([
                'message' => 'Company updated',
                'data' => $company
            ], 200);
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json(null, 204);
    }
}
