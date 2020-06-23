<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Salary;

class SalaryTest extends TestCase
{
    public function testCreate(): void
    {
        $salaryValue = 9999;
        $taxValue = 777;
        $bonusValue = 800;
        $deductionValue = 425;

        $salary = (new Salary())
            ->setSalary($salaryValue)
            ->setTax($taxValue)
            ->setBonus($bonusValue)
            ->setDeduction($deductionValue);

        $this->assertEquals($salaryValue, $salary->getSalary());
        $this->assertEquals($taxValue, $salary->getTax());
        $this->assertEquals($bonusValue, $salary->getBonus());
        $this->assertEquals($deductionValue, $salary->getDeduction());
    }
}
