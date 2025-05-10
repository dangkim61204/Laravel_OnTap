<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Repositories\DepartmentRepository;
use App\Services\DepartmentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

      protected $departmentService;
    protected $departmentRepository;
    public function __construct(DepartmentService $departmentService,
     DepartmentRepository $departmentRepository)
    {

        $this->departmentService = $departmentService;
        $this->departmentRepository = $departmentRepository;
        
    }

    public function index() {
        $departments= $this->departmentService->getAllDepartments();
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
