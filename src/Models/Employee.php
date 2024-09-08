<?php
namespace Taller2\Models;


    class Employee{

        //Atributos
        private string $name;
        private string $phone;
        private string $email;
        private float $salary_month;
        private float $salary_year;

        //Magic Methods
        public function __construct(string $name, string $phone, string $email, string $salary_month){            
            $this->name = $name;
            $this->phone = $phone;
            $this->email = $email;
            $this->salary_month = $salary_month;
            $this->calculateSalaryYear();
        }

        //Getters
        public function getName(){
            return $this->name;
        }
        public function getPhone(){
            return $this->phone;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getSalaryMonth(){
            return $this->salary_month;
        }
        public function getSalaryYear(){
            return $this->salary_year;
        }

        //Setters
        public function setName(string $name){
            $this->name = $name;
        }
        public function setPhone(string $phone){
            $this->phone = $phone;
        }
        public function setEmail(string $email){
            $this->email = $email;
        }
        public function setSalaryMonth(float $salary_month): void {
            $this->salary_month = $salary_month;
            $this->calculateSalaryYear();
        }



        //Methods
        public function toArray(){
            return [
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'salary_month' => $this->salary_month,
                'salary_year' => $this->salary_year
            ];
        }
        public function calculateSalaryYear(){
            $this->salary_year = $this->salary_month * 12;
        }
    }

?>