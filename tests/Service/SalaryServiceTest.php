<?php

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Entity\Employee;
use App\Entity\Salary;
use App\Service\BonusService;
use App\Service\DeductionService;
use App\Service\SalaryService;
use App\Service\TaxService;

class SalaryServiceTest extends TestCase
{
    /** MockObject|BonusService */
    private $bonusServiceMock;

    /** MockObject|DeductionService */
    private $deductionServiceMock;
    
    /** MockObject|TaxService */
    private $taxServiceMock;

    public function testGetSalary(): void
    {
        $employeeMock = $this->getMockBuilder(Employee::class)
            ->getMock();
        $employeeMock->method('getSalary')
            ->willReturn(1000);

        $service = new SalaryService(
            $this->taxServiceMock,
            $this->bonusServiceMock,
            $this->deductionServiceMock
        );

        $this->assertEquals(
            (new Salary())
                ->setSalary(1000)
                ->setTax(150)
                ->setBonus(200)
                ->setDeduction(100),
            $service->getSalary($employeeMock)
        );
    }

    public function testGetNetSalaryValue(): void
    {
        $salaryMock = $this->getMockBuilder(Salary::class)
            ->getMock();
        $salaryMock->method('getSalary')
            ->willReturn(1000);
        $salaryMock->method('getTax')
            ->willReturn(150);
        $salaryMock->method('getBonus')
            ->willReturn(200);
        $salaryMock->method('getDeduction')
            ->willReturn(100);

        $service = new SalaryService(
            $this->taxServiceMock,
            $this->bonusServiceMock,
            $this->deductionServiceMock
        );

        $this->assertEquals(950, $service->getNetSalaryValue($salaryMock));
    }
    
    protected function setUp(): void
    {
        $this->bonusServiceMock = $this->getMockBuilder(BonusService::class)
            ->getMock();
        $this->bonusServiceMock->method('getAgeBonusValue')
            ->willReturn(200);

        $this->deductionServiceMock = $this->getMockBuilder(DeductionService::class)
            ->getMock();
        $this->deductionServiceMock->method('getCarDeductionValue')
            ->willReturn(100);

        $this->taxServiceMock = $this->getMockBuilder(TaxService::class)
            ->getMock();
        $this->taxServiceMock->method('getTaxValue')
            ->willReturn(150);
    }
}
