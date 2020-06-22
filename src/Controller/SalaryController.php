<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Form\Type\EmployeeType;
use App\Service\SalaryService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SalaryController extends AbstractController
{
    public function calculate(Request $request, SalaryService $salaryService)
    {
        $employee = new Employee();
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $employee = $form->getData();
            $salary = $salaryService->getSalary($employee);
            $netSalaryValue = $salaryService->getNetSalaryValue($salary);
            return $this->render(
                'salary/show.html.twig',
                [
                    'employee' => $employee,
                    'salary' => $salary,
                    'netSalaryValue' => $netSalaryValue,
                    'url' => $this->generateUrl('salary_calculate')
                ]
            );
        }
        
        return $this->render(
            'salary/calculate.html.twig',
            [
                'form' => $form->createView(),
                'is_submitted' => (int) $form->isSubmitted()
            ]
        );
    }
}
