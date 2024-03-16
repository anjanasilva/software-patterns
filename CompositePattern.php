<?php

// Component interface
interface Node {
    public function getName();
    public function print();
}

// Leaf class (represents a file)
class File implements Node {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function print() {
        echo "File: " . $this->getName() . "\n";
    }
}

// Composite class (represents a directory)
class Folder implements Node {
    private $name;
    private $children = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function add(Node $node) {
        $this->children[] = $node;
    }

    public function print() {
        echo "Directory: " . $this->getName() . "\n";
        foreach ($this->children as $child) {
            $child->print();
        }
    }
}

// Client code
$file1 = new File("file1.txt");
$file2 = new File("file2.txt");

$dir1 = new Folder("Folder 1");
$dir1->add($file1);
$dir1->add($file2);

$dir2 = new Folder("Main Folder");
$dir2->add($dir1);

// Print the entire hierarchy
$dir2->print();

?>
