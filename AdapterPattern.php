<?php

class PaymentGatewayV1 {
    public function makePayment($amount) {
        echo "Processing payment of $amount using the old payment gateway.\n";
    }
}

interface PaymentGatewayV2 {
    public function pay($amount);
}

class PaymentGatewayAdapterV2 implements PaymentGatewayV2 {
    private $oldGateway;

    public function __construct(PaymentGatewayV1 $oldGateway) {
        $this->oldGateway = $oldGateway;
    }

    public function pay($amount) {
        $this->oldGateway->makePayment($amount);
    }
}

$oldGateway = new PaymentGatewayV1();
$newGatewayAdapter = new PaymentGatewayAdapterV2($oldGateway);

// Using the adapter to make payments through the new gateway
// Outputs Processing payment of 50 using the old payment gateway.
$newGatewayAdapter->pay(50);
