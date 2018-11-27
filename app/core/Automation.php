<?php

class Automation extends Controller {


    //Payroll for a Month
    function monthlyPayroll() {
        $branchModel = $this->model('BranchModel');
        $allSalaries = $branchModel->payroll();
        $total = 0;

        foreach ($allSalaries as $salary) {
            $total += ($salary/12);
        }

        return $total;
    }

    //Payroll for a Month by City
    function monthlyPayrollByCity($city) {
        $branchModel = $this->model('BranchModel');
        $allSalaries = $branchModel->payrollByCity($city);
        $total = 0;

        foreach ($allSalaries as $salary) {
            $total += ($salary/12);
        }

        return $total;
    }

    //Payroll for a Month by Branch
    function monthlyPayrollByBranch($branch_id) {
        $branchModel = $this->model('BranchModel');
        $allSalaries = $branchModel->payrollByBranch($branch_id);
        $total = 0;

        foreach ($allSalaries as $salary) {
            $total += ($salary/12);
        }

        return $total;
    }

    function annualLosses() {
        $branchModel = $this->model('BranchModel');
        $allSalaries = $branchModel->payroll();
        $total = 0;

        foreach ($allSalaries as $salary) {
            $total += $salary;
        }

        return $total;
    }

    function annualLossesByBranch($branch) {
        $branchModel = $this->model('BranchModel');
        $allSalaries = $branchModel->payrollByBranch($branch);
        $total = 0;

        foreach ($allSalaries as $salary) {
            $total += $salary;
        }

        return $total;
    }

    function annualLossesByCity($city) {
        $branchModel = $this->model('BranchModel');
        $allSalaries = $branchModel->payrollByCity($city);
        $total = 0;

        foreach ($allSalaries as $salary) {
            $total += $salary;
        }

        return $total;
    }

    function processPayments() {
        $transactionModel = $this->model('TransactionModel');
        $futurePaymentsModel = $this->model('FuturePaymentsModel');
        $today = (new \DateTime())->format('Y-m-d');


    }
}
//TODO: Make transfers on the dates they need to be made.
//TODO: Charge clients monthly.

?>