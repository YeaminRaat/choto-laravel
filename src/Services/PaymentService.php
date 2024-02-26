<?php

namespace src\Services;

class PaymentService
{
    public $testService;
    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    public function pay()
    {
        return "Payment done";
    }
}