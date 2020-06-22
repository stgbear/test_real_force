<?php

namespace App\Service;

use App\Entity\Employee;

class TaxService
{
    /**
     * @param Employee $employee
     * 
     * @return float
     */
    public function getTaxValue(Employee $employee): float
    {
        $salaryTax = $employee->getChildrenCnt() > 2 ? 0.18 : 0.2;
        
        return ceil($employee->getSalary() * $salaryTax);
    }
}
