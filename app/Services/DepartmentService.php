<?php

namespace App\Services;

use App\Models\Department;
use App\Repositories\DepartmentRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class DepartmentService.
 */
class DepartmentService
{
     protected $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function getAllDepartments(): Collection
    {
        return $this->departmentRepository->all();
    }

    public function createDepartment(array $data): Department
    {
        return $this->departmentRepository->create($data);
    }

    public function updateDepartment(Department $department, array $data): Department{
        return $this->departmentRepository->update($department, $data);
    }
    public function deleteDepartment(Department $department): bool{
        return $this->departmentRepository->delete($department);
    }
}
