<?php

namespace src\Controller;

use src\Services\PaymentService;

class UserController
{
    public $payment;
    public function __construct(PaymentService $payment)
    {
        $this->payment = $payment;
    }

    public function check()
    {
        return $this->payment->testService->test();
    }
}