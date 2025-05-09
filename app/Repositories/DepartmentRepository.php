<?php

namespace App\Repositories;

use App\Models\Department;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class DepartmentRepository.
 */
class DepartmentRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Department::class;
    }
}
