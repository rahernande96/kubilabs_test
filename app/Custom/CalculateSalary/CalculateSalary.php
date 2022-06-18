<?php
namespace App\Custom\CalculateSalary;


class CalculateSalary {
    
    /**
     * base_salary
     *
     * @var mixed
     */
    private $base_salary;    
    /**
     * worked_days
     *
     * @var mixed
     */
    private $worked_days;    
    /**
     * sales_value
     *
     * @var mixed
     */
    private $sales_value;    
    /**
     * calculated_salary
     *
     * @var mixed
     */
    private $calculated_salary;    
    /**
     * commissions_earned
     *
     * @var mixed
     */
    private $commissions_earned;    
    /**
     * proration_percentage
     *
     * @var mixed
     */
    private $proration_percentage;
    
    /**
     * months_days
     *
     * @var int
     */
    private $months_days = 30;

    /**
     * CalculateSalary constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->base_salary = $data['base_salary'];
        $this->worked_days = $data['worked_days'];
        $this->sales_value = $data['sales_value'];
    }

    /**
     * Calculate
     *
     * @return array
     */
    public function calculate()
    {
        $this->commissions_earned = $this->calculateEarnings();
        $this->calculated_salary = $this->calculateSalary();
        $this->proration_percentage = $this->calculateProrotationPercentage();

        return $this;
    }
    
    /**
     * calculateProrotationPercentage
     *
     * @return void
     */
    public function calculateProrotationPercentage(){

        $total = 100 - ($this->worked_days / $this->months_days) * 100;

        return $this->to2Decimals($total);
    }
    
    /**
     * calculateEarnings
     *
     * @return void
     */    
    /**
     * calculateEarnings
     *
     * @return int
     */
    public function calculateEarnings(){
        
        $total = $this->sales_value * $this->getSalesValuePercentage();
        $earnings_per_day = $total / $this->months_days;

        return $this->to2Decimals($earnings_per_day * $this->worked_days);
    }
    
    /**
     * calculateSalary
     *
     * @return void
     */
    public function calculateSalary(){
        
        $salary_per_day = $this->base_salary / $this->months_days;

        $total = ($this->worked_days * $salary_per_day) + $this->commissions_earned;

        return $this->to2Decimals($total); 
    }
    
    /**
     * getData
     *
     * @return void
     */
    public function getData(){
        
        return collect([
            'base_salary' => $this->base_salary,
            'worked_days' => $this->worked_days,
            'sales_value' => $this->sales_value,
            'calculated_salary' => $this->calculated_salary,
            'commissions_earned' => $this->commissions_earned,
            'proration_percentage' => $this->proration_percentage,
        ]);

    }
    
    /**
     * getSalesValuePercentage
     *
     * @param  mixed $sales_value
     * @return void
     */
    public function getSalesValuePercentage()
    {
        $percentage = 0;

        switch ($this->sales_value) {
            case $this->sales_value <= 1000:
                $percentage = 0.01;
                break;
            case $this->sales_value > 1000 && $this->sales_value <= 5000:
                $percentage = 0.05;
                break;
            default:
                $percentage = 0.1;
                break;
        }

        return $percentage;
    }
    
    /**
     * to2Decimals
     *
     * @param  mixed $value
     * @return void
     */
    public function to2Decimals($value){
        return number_format((float)$value, 2, '.', '');
    }
}