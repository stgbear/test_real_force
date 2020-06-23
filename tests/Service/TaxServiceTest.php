<?php

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Entity\Employee;
use App\Service\TaxService;

class TaxServiceTest extends TestCase
{
    /**
     * @dataProvider getTaxValueDataProvider
     * 
     * @param int $childrenCnt
     * @param float $salary
     */
    public function testGetTaxValue(int $childrenCnt, float $salary, float $expected): void
    {
        $employeeMock = $this->getMockBuilder(Employee::class)
            ->getMock();
        $employeeMock->method('getChildrenCnt')
            ->willReturn($childrenCnt);
        $employeeMock->method('getSalary')
            ->willReturn($salary);

        $service = new TaxService();
        $this->assertEquals($expected, $service->getTaxValue($employeeMock));
    }

    /**
     * @return []
     */
    public function getTaxValueDataProvider(): array
    {
        return [
            [0, 1000, 200],
            [2, 2000, 400],
            [3, 3000, 540]
        ];
    }
}
