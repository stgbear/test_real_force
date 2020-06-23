<?php

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Entity\Employee;
use App\Service\DeductionService;

class DeductionServiceTest extends TestCase
{
    /**
     * @dataProvider getCarDeductionValueDataProvider
     * 
     * @param bool $hasCompanyCar,
     * @param float $expected
     */
    public function testGetCarDeductionValue(bool $hasCompanyCar, float $expected): void
    {
        $employeeMock = $this->getMockBuilder(Employee::class)
            ->getMock();
        $employeeMock->method('getHasCompanyCar')
            ->willReturn($hasCompanyCar);

        $service = new DeductionService();
        $this->assertEquals($expected, $service->getCarDeductionValue($employeeMock));
    }

    /**
     * return []
     */
    public function getCarDeductionValueDataProvider(): array
    {
        return [
            [true, 500],
            [false, 0]
        ];
    }
}
