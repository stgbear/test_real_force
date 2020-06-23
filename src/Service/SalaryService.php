<?php

namespace App\Service;

use App\Entity\Employee;
use App\Entity\Salary;

class SalaryService
{
    /** @var TaxService */
    private $taxService;

    /** @var BonusService */
    private $bonusService;

    /** @var DeductionService */
    private $deductionService;

    /**
     * @param TaxService $taxService
     * @param BonusService $bonusService
     * @param DeductionService $deductionService
     */
    public function __construct(
        TaxService $taxService,
        BonusService $bonusService,
        DeductionService $deductionService
    )
    {
        $this->taxService = $taxService;
        $this->bonusService = $bonusService;
        $this->deductionService = $deductionService;
    }

    /**
     * @param Employee $employee
     * 
     * @return Salary
     */
    public function getSalary(Employee $employee): Salary
    {
        $ageBonusValue = $this->bonusService->getAgeBonusValue($employee);
        $taxValue = $this->taxService->getTaxValue($employee);
        $carDeductionValue = $this->deductionService->getCarDeductionValue($employee);

        return (new Salary())
            ->setSalary($employee->getSalary())
            ->setTax($taxValue)
            ->setBonus($ageBonusValue)
            ->setDeduction($carDeductionValue);
    }

    /**
     * @param Salary $salary
     * 
     * @return float
     */
    public function getNetSalaryValue(Salary $salary): float
    {
        return $salary->getSalary()
            + $salary->getBonus()
            - $salary->getTax()
            - $salary->getDeduction();
    }
}
