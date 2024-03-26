<?php

$sampleEmployee = [
    'name'   => 'Employee Name',
    'level'  => 'Employee Level',
    'salary' => 111111,
];

class EmployeeManager {
    private $employee;

    public function __construct( ?array $employee = null ) {
        if ( $employee ) {
            $this->employee = $employee;
        }
    }

    public function getEmployeeSalary() {
        if ( $this->employee ) {
            return $this->employee['salary'];
        } else {
            return false;
        }
    }

    public function setEmployeeSalary( int $salary ) {
        if ( $this->employee ) {
            $this->employee['salary'] = $salary;
        } else {
            return false;
        }
    }
}

$employeeMan = new EmployeeManager( $sampleEmployee );

var_dump( $employeeMan->getEmployeeSalary() );

$employeeMan->setEmployeeSalary( 123456 );

var_dump( $employeeMan->getEmployeeSalary() );
