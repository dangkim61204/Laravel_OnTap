<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    // public function __construct(DepartmentService $departmentService)
    // {
    //     $this->departmentService = $departmentService;
    // }
    public function index() {
        $departments = Department::all();
        return view('backend.department.index', compact('departments'));
    }
    
    public function create() {
        return view('backend.department.create');
    }

    public function store(Request $request):RedirectResponse {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string']
        ]);

        Department::create($validated);


        return redirect()->route('admin.department.index')
            ->with('success', 'Department created successfully');
    }

    public function edit(Department $department) {
        return view('backend.department.edit', compact('department'));
    }
    public function update(Request $request, Department $department) {
        $validated = $request->validate([
            'name'=> ['', 'string','max:255'],
            'description'=> ['nullable', 'string'],
         
        ]);
        Department::where('id', $department->id)->update($validated);
        return redirect()->route('admin.department.index')
            ->with('success', 'Department updated successfully');
    }

    // Xử lý xóa department
    
   public function delete(Department $department): RedirectResponse
   {
      Department::where('id', $department->id)->delete();

       return redirect()->route('admin.department.index')
           ->with('success', 'Department deleted successfully');
   }
}
