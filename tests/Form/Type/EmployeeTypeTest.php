<?php

namespace App\Tests\Form\Type;

use Symfony\Component\Form\Test\TypeTestCase;
use App\Entity\Employee;
use App\Form\Type\EmployeeType;

class EmployeeTypeTest extends TypeTestCase
{
    public function testSubmit(): void
    {
        $data = [
            'name' => 'Alice',
            'childrenCnt' => 2,
            'hasCompanyCar' => false,
            'salary' => 6000
        ];
        
        $expectedEmployee = (new Employee())
            ->setName($data['name'])
            ->setChildrenCnt($data['childrenCnt'])
            ->setHasCompanyCar($data['hasCompanyCar'])
            ->setSalary($data['salary']);
        
        $actualEmployee = new Employee();
        
        $form = $this->factory->create(EmployeeType::class, $actualEmployee);
        
        $form->submit($data);
        
        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($expectedEmployee, $actualEmployee);
    }
}
