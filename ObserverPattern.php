<?php

interface Subject {
    public function attach(Observer $observer): void;

    public function detach(Observer $observer): void;

    public function notify(): void;
}

interface Observer {
    public function update(): void;
}

class ConcreteSubject implements Subject {
    private $observers = [];

    public function attach(Observer $observer): void {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void {
        unset($this->observers[$observer]);
    }

    public function notify(): void {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}

class ConcreteObserver implements Observer {
    public function update(): void {
        echo 'The subject has changed!';
    }
}

$subject = new ConcreteSubject();
$observer = new ConcreteObserver();

$subject->attach($observer);
$subject->notify(); // The subject has changed!

?>
