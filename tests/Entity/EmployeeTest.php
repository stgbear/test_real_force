<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Employee;

class EmployeeTest extends TestCase
{
    public function testCreate(): void
    {
        $name = 'EmployeeName';
        $age = 32;
        $childrenCnt = 3;
        $hasCompanyCar = true;
        $salary = 5000;

        $employee = (new Employee())
            ->setName($name)
            ->setAge($age)
            ->setChildrenCnt($childrenCnt)
            ->setHasCompanyCar($hasCompanyCar)
            ->setSalary($salary);

        $this->assertEquals($name, $employee->getName());
        $this->assertEquals($age, $employee->getAge());
        $this->assertEquals($childrenCnt, $employee->getChildrenCnt());
        $this->assertEquals($hasCompanyCar, $employee->getHasCompanyCar());
        $this->assertEquals($salary, $employee->getSalary());
    }
}
