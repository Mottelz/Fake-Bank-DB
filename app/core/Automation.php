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

    function annualProfits(){
        $accountModel = $this->model('AccountModel');
        $accounts = $accountModel->GetAllAccounts();
        $totalProfits = 0;
        foreach ($accounts as $account) {
            $fees = 10.00;
            if($account->transCount > 5) {
                $fees += ($account->transCount-5) * 4.5;
            }
            $totalProfits+= $fees;
        }
        return $totalProfits;
    }

    function annualProfitsByBranch($branch_id) {
        $accountModel = $this->model('AccountModel');
        $accounts = $accountModel->GetAccountsByBranch($branch_id);
        $totalProfits = 0;
        foreach ($accounts as $account) {
            $fees = 10.00;
            if($account->transCount > 5) {
                $fees += ($account->transCount-5) * 4.5;
            }
            $totalProfits+= $fees;
        }
        return $totalProfits;
    }

    function annualProfitsByCity($city) {
        $accountModel = $this->model('AccountModel');
        $accounts = $accountModel->GetAccountsByCity($city);
        $totalProfits = 0;
        foreach ($accounts as $account) {
            $fees = 10.00;
            if($account->transCount > 5) {
                $fees += ($account->transCount-5) * 4.5;
            }
            $totalProfits+= $fees;
        }
        return $totalProfits;

    }

}

//TODO: Charge clients monthly.

?>
