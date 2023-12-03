<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class EmployeeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Employees::all();
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = array('response' => '', 'success' => false);
        $rules = [
            'first_nm' => 'required',
            'last_nm' => 'required',
            'email' => 'required|unique:employees|email:dns',
            'phone' => 'required|unique:employees|numeric',
            'company_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            $employee = Employees::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Successfuly add new employee',
                'data' => $employee
            ], 201);
        }
        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Employees $employee)
    {
        return $employee;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employees $employee)
    {
        $response = array('response' => '', 'success' => false);
        $rules = [
            'first_nm' => 'required',
            'last_nm' => 'required',
            'company_id' => 'required'
        ];
        if ($request->email != $employee->email) {
            $rules['email'] = 'required|unique:employees|email:dns';
        }
        if ($request->phone != $employee->phone) {
            $rules['phone'] = 'required|unique:employees|numeric';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['response'] = $validator->messages();
        } else {
            $employee->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Successfuly update employee',
                'data' => $employee
            ], 200);
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employees $employee)
    {
        $employee->delete();
        return response()->json(null, 204);
    }
}
