<?php
//Faiz Nur Budi
//21081010113  
class Product {
    protected $name;
    protected $price;
    protected $discount;

    public function __construct($name, $price, $discount) {
        $this->name = $name;
        $this->price = $price;
        $this->discount = $discount;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setDiscount($discount) {
        $this->discount = $discount;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return "Rp." . $this->price;
    }

    public function getDiscount() {
        return $this->discount . "%";
    }
}

class CDMusic extends Product {
    protected $artist;
    protected $genre;

    public function __construct($name, $price, $discount, $artist, $genre) {
        parent::__construct($name, $price, $discount);
        $this->artist = $artist;
        $this->genre = $genre;
        $this->price = $this->price * 1.1;
        $this->discount = $this->discount * 1.05;
    }

    public function setPrice($price) {
        $this->price = $price * 1.1;
    }

    public function setDiscount($discount) {
        $this->discount = $discount*1.05;
    }

    public function setArtist($artist) {
        $this->artist = $artist;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function getArtist() {
        return $this->artist;
    }

    public function getGenre() {
        return $this->genre;
    }
    
}

class CDRack extends Product {
    protected $capacity;
    protected $model;

    public function __construct($name, $price, $discount, $capacity, $model) {
        parent::__construct($name, $price, $discount);
        $this->capacity = $capacity;
        $this->model = $model;
        $this->price = $this->price * 1.15;
    }

    public function setPrice($price) {
        $this->price = $price*1.15;
    }

    public function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function getModel() {
        return $this->model;
    }
}

$produk = new Product("Music",500000,20);
echo "Product Information :" . "<br>";
echo "Name: " . $produk->getName() . "<br>";
echo "Price: " . $produk->getPrice() . "<br>";
echo "Discount: " . $produk->getDiscount() . "<br>";
echo "<br>";
$cdMusic = new CDMusic("Sky", 100000, 10, "Echo", "Pop");
echo "CD Music Information:"."<br>";
echo "Name: " . $cdMusic->getName() . "<br>";
echo "Price: " . $cdMusic->getPrice() . "<br>";
echo "Discount: " . $cdMusic->getDiscount() . "<br>";
echo "Artist: " . $cdMusic->getArtist() . "<br>";
echo "Genre: " . $cdMusic->getGenre() . "<br>";

// Mengubah name, price, discount, artist dan genre
$cdMusic->setPrice(200000);
$cdMusic->setDiscount(30);
$cdMusic->setName("Haven");
$cdMusic->setArtist("Vi");
$cdMusic->setGenre("Rock");

echo "<br>Updated CD Music Information:<br>";
echo "Name: " . $cdMusic->getName() . "<br>";
echo "Price: " . $cdMusic->getPrice() . "<br>";
echo "Discount: " . $cdMusic->getDiscount() . "<br>";
echo "Artist: " . $cdMusic->getArtist() . "<br>";
echo "Genre: " . $cdMusic->getGenre() . "<br>";

echo "<br>";

$cdRack = new CDRack("Harmony", 200000, 20, 100, "Model 1");
echo "CD Rack Information:<br>";
echo "Name: " . $cdRack->getName() . "<br>";
echo "Price: " . $cdRack->getPrice() . "<br>";
echo "Discount: " . $cdRack->getDiscount() . "<br>";
echo "Capacity: " . $cdRack->getCapacity() . " CDs<br>";
echo "Model: " . $cdRack->getModel() . "<br>";

// Mengubah name, price, discount, capacity dan model
$cdRack->setDiscount(10);
$cdRack->setName("Romance");
$cdRack->setPrice(100000);
$cdRack->setCapacity(150);
$cdRack->setModel("Model 2");

echo "<br>Updated CD Rack Information:<br>";
echo "Name: " . $cdRack->getName() . "<br>";
echo "Price: " . $cdRack->getPrice() . "<br>";
echo "Discount: " . $cdRack->getDiscount() . "<br>";
echo "Capacity: " . $cdRack->getCapacity() . " CDs<br>";
echo "Model: " . $cdRack->getModel() . "<br>";
?>