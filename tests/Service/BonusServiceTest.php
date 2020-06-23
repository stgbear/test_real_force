<?php

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Entity\Employee;
use App\Service\BonusService;

class BonusServiceTest extends TestCase
{
    /**
     * @dataProvider getAgeBonusValueDataProvider
     * 
     * @param int $age
     * @param float $salary
     */
    public function testGetAgeBonusValue(int $age, float $salary, float $expected): void
    {
        $employeeMock = $this->getMockBuilder(Employee::class)
            ->getMock();
        $employeeMock->method('getAge')
            ->willReturn($age);
        $employeeMock->method('getSalary')
            ->willReturn($salary);

        $service = new BonusService();
        $this->assertEquals($expected, $service->getAgeBonusValue($employeeMock));
    }

    /**
     * @return []
     */
    public function getAgeBonusValueDataProvider(): array
    {
        return [
            [25, 1000, 0],
            [60, 2000, 140],
            [50, 3000, 0]
        ];
    }
}
