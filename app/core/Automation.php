<?php

class Automation extends Controller {


    //Payroll for a Month
    function monthlyPayroll() {
        $branchModel = $this->model('BranchModel');
        $allSalaries = $branchModel->payroll();
        $total = 0;

        foreach ($allSalaries as $salary) {
            $total += ($salary->Salary/12);
        }

        return $total;
    }

    //Payroll for a Month by City
    function monthlyPayrollByCity($city) {
        $branchModel = $this->model('BranchModel');
        $allSalaries = $branchModel->payrollByCity($city);
        $total = 0;

        foreach ($allSalaries as $salary) {
            $total += ($salary->Salary/12);
        }

        return $total;
    }

    //Payroll for a Month by Branch
    function monthlyPayrollByBranch($branch_id) {
        $branchModel = $this->model('BranchModel');
        $allSalaries = $branchModel->payrollByBranch($branch_id);
        $total = 0;

        foreach ($allSalaries as $salary) {
            $total += ($salary->Salary/12);
        }

        return $total;
    }

    function annualLosses() {
        $branchModel = $this->model('BranchModel');
        $allSalaries = $branchModel->payroll();
        $total = 0;

        foreach ($allSalaries as $salary) {
            $total += $salary->Salary;
        }

        return $total;
    }

    function annualLossesByBranch($branch) {
        $branchModel = $this->model('BranchModel');
        $allSalaries = $branchModel->payrollByBranch($branch);
        $total = 0;

        foreach ($allSalaries as $salary) {
            $total += $salary->Salary;
        }

        return $total;
    }

    function annualLossesByCity($city) {
        $branchModel = $this->model('BranchModel');
        $allSalaries = $branchModel->payrollByCity($city);
        $total = 0;

        foreach ($allSalaries as $salary) {
            $total += $salary->Salary;
        }

        return $total;
    }

    function processPayments() {
        $transactionModel = $this->model('TransactionModel');
        $futurePaymentsModel = $this->model('FuturePaymentsModel');
        $today = (new \DateTime())->format('Y-m-d');

        $activePayments = $futurePaymentsModel->getActiveFuturePayments($today);

        foreach ($activePayments as $payment) {
            $diff = date_diff(date_create($payment->Future_Payments_Start_date), date_create($today));
            if ($diff % $payment->Frequency == 0) {
                $transtId = $transactionModel->getNextTransId();
                $transactionModel->insertTransfer($transtId, $payment->To_accid, $payment->From_accid, $payment->Amount, $today);
            }
        }
    }

    function getAllProfits(){
        //get all accounts
        //for each account,
            //fees = 10.00
            //if count of transactions > 5
                //Fees += (transactionCount -5) * 4.5
            //chargeAccountFees()

        //get accounts by branch
        //for each account,
        //fees = 10.00
        //if count of transactions > 5
            //Fees += (transactionCount -5) * 4.5
            //chargeAccountFees()

        //get accounts by city
        //for each account,
            //fees = 10.00
            //if count of transactions > 5
                //Fees += (transactionCount -5) * 4.5
            //chargeAccountFees()
    }

}


?>
