<?php 
    class Book
    {
        //properties
        private $title;
        private $author;
        private $price;

        //constructor
        public function __construct($title, $author, $price)
        {
            $this->title = $title;
            $this->author = $author;
            $this->price = $price;
        }

        //getters
        public function getTitle()
        {
            return $this->title;
        }
        public function getAuthor()
        {
            return $this->author;
        }
        public function getPrice()
        {
            return $this->price;
        }
    }

    /**
     * Class book acts as a blue print
     * from this "blueprint" we can create different object (check line 41 to 43)
     */

    $science = new Book("Science & Techonology", "John Doe", 54.00);
    $math = new Book("TCWAG", "Leighthold", 60.00);
    $arts = new Book("The act of moving pictures", "Steven Spielberg", 100.00);
    /**
     * Each object has the same properties and methods BUT it has different values.
     * when you CALL the getters YOU will the different values
     */

    echo $science->getTitle()."<br>";
    echo $science->getAuthor()."<br>";
    echo $science->getPrice()."<br>";

    echo $math->getTitle()."<br>";
    echo $math->getAuthor()."<br>";
    echo $math->getPrice()."<br>";

    echo $arts->getTitle()."<br>";
    echo $arts->getAuthor()."<br>";
    echo $arts->getPrice()."<br>";
?>