<?php

class BankAccount {
    private $name;
    private $balance;

    public function __construct($name, $balance) {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        $this->balance -= $amount;
    }

    public function getBalance() {
        return $this->balance;
    }
}

class BankFacade {
    private $bankAccount;

    public function __construct(BankAccount $bankAccount) {
        $this->bankAccount = $bankAccount;
    }

    public function deposit($amount) {
        $this->bankAccount->deposit($amount);
    }

    public function withdraw($amount) {
        $this->bankAccount->withdraw($amount);
    }

    public function getBalance() {
        return $this->bankAccount->getBalance();
    }
}

$bankAccount = new BankAccount('James Smith', 1000);
$facade = new BankFacade($bankAccount);

$facade->deposit(500);
$facade->withdraw(200);

echo $facade->getBalance(); // 1300

?>
