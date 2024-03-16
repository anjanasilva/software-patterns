<?php

// Define a strategy interface
interface PaymentStrategy {
    public function pay($amount);
}

// Concrete implementations of payment strategies
class CreditCardPayment implements PaymentStrategy {
    public function pay($amount) {
        echo "Paid $amount via Credit Card.\n";
    }
}

class PayPalPayment implements PaymentStrategy {
    public function pay($amount) {
        echo "Paid $amount via PayPal.\n";
    }
}

// Context class that uses a payment strategy
class ShoppingCart {
    private $paymentStrategy;
    
    public function setPaymentStrategy(PaymentStrategy $paymentStrategy) {
        $this->paymentStrategy = $paymentStrategy;
    }
    
    public function checkout($amount) {
        $this->paymentStrategy->pay($amount);
    }
}

// Client code
$cart = new ShoppingCart();

// Use Credit Card payment strategy
$cart->setPaymentStrategy(new CreditCardPayment());
$cart->checkout(100);

// Use PayPal payment strategy
$cart->setPaymentStrategy(new PayPalPayment());
$cart->checkout(50);

?>
