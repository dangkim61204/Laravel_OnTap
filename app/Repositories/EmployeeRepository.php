<?php

namespace App\Repositories;

use App\Models\Employee;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class EmployeeRepository.
 */
class EmployeeRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Employee::class;
    }
}
