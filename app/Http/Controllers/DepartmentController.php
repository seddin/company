<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

use Illuminate\Http\RedirectResponse;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departmentsWithChildren = Department::whereDoesntHave('parent')->get();
        $allDepartments = Department::all();

        return view('departments.index', [
            'departments' => $departmentsWithChildren,
            'allDepartments' => $allDepartments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:25',
            'parent_id' => 'nullable|integer|max:27'
        ]);
 
        $department = new Department([
            'name' => $validated['name'],
            'parent_id' => $validated['parent_id'],
        ]);

        $department->save();
 
        return redirect(route('departments.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
