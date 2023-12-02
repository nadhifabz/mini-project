<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employees;
use Illuminate\Support\Facades\Blade;
use App\Http\Requests\StoreEmployeesRequest;
use App\Http\Requests\UpdateEmployeesRequest;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.employees.index',[
            "employees" => Employees::all(),
            "active" => "employee"
        ]);
    }

    public function list()
    {
        $response = Employees::all();
        for ($i = 0; $i < $response->count(); $i++) {
            $response[$i]['action'] = Blade::render(
                '<a href="/employees/' . $response[$i]["id"] . '/edit" class="btn btn-warning btn-sm">Edit</a>
                <form action="/employees/'. $response[$i]["id"] .'" method="POST" class="d-inline">
                @method("delete")
                @csrf
                <button class="btn btn-sm btn-danger" onclick="return confirm("Are you sure?")">Delete</button>
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
        return view('dashboard.employees.create',[
            "companies" => Company::all(),
            "active" => "employee"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeesRequest $request)
    {
        $validatedData = $request->validated();
        Employees::create($validatedData);
        return redirect('/employees')->with('success', 'Added new empployee!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employees $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employees $employee)
    {
        // dd($employee);
        return view('dashboard.employees.edit',[
            "companies" => Company::all(),
            "employee" => $employee,
            "active" => "employee"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeesRequest $request, Employees $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employees $employee)
    {
        Employees::where('id', $employee->id)->delete();
        return redirect('/employee')->with('success', $employee->first_nm . " " . $employee->last_nm . "has been deleted!");
    }
}
