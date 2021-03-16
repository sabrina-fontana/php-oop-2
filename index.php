<?php

class Shop {
  protected $name;
  protected $website;
  protected $headquarters;

  public function __construct(string $name, string $website, string $headquarters) {
    $this -> name = $name;
    $this -> website = $website;
    $this -> headquarters = $headquarters;
  }

  public function getName() {
    return $this -> name;
  }

  public function getWebsite() {
    return $this -> website;
  }

  public function getHeadquarters() {
    return $this -> headquarters;
  }
}

class User {
  private $id;
  protected $name;
  protected $surname;
  protected $birthdate;
  protected $mail;
  protected $deliveryDays = 5;
  protected $cards = [];
  protected $purchasedProducts = [];

  public function __construct(int $id, string $name, string $surname, string $birthdate, string $mail) {
    $this -> id = $id;
    $this -> name = $name;
    $this -> surname = $surname;
    $this -> birthdate = $birthdate;
    $this -> mail = $mail;
  }

  public function getId() {
    return $this -> id;
  }

  public function getName() {
    return $this -> name;
  }

  public function getSurname() {
    return $this -> surname;
  }

  public function getBirthdate() {
    return $this -> birthdate;
  }

  public function getMail() {
    return $this -> mail;
  }

  public function getCards() {
    return $this -> cards;
  }

  public function getPurchasedProducts() {
    return $this -> purchasedProducts;
  }

  public function addCard(CreditCard $card) {
    $this -> cards[] = $card;
  }

  public function buyProduct(Product $product) {
    $this -> purchasedProducts[] = $product;
  }

  public function setMail($mail) {
    $this -> mail = $mail;
  }
}

class PremiumUser extends User {
  protected $deliveryDays = 2;
  protected $monthlySubscription;

  public function setSubscription($subscriptionPrice) {
    $this -> monthlySubscription = $subscriptionPrice;
  }

  public function getMonthlySubscription() {
    return $this -> monthlySubscription;
  }
}

class CreditCard {
  protected $cardNumber;
  protected $holder;
  protected $securityCode;
  protected $expirationDate;

  public function __construct(int $cardNumber, string $holder, int $securityCode, string $expirationDate) {
    $this -> cardNumber = $cardNumber;
    $this -> holder = $holder;
    $this -> securityCode = $securityCode;
    $this -> expirationDate = $expirationDate;
  }

  public function getCardNumber() {
    return $this -> cardNumber;
  }

  public function getHolder() {
    return $this -> holder;
  }

  public function getSecurityCode() {
    return $this -> securityCode;
  }

  public function getExpirationDate() {
    return $this -> expirationDate;
  }
}

class Product {
  private $id;
  protected $title;
  protected $author;
  protected $price;

  public function __construct(int $id, string $title, string $author, float $price) {
    $this -> id = $id;
    $this -> title = $title;
    $this -> author = $author;
    $this -> price = $price;
  }

  public function getId() {
    return $this -> id;
  }

  public function getTitle() {
    return $this -> title;
  }
  public function getAuthor() {
    return $this -> author;
  }

  public function getPrice() {
    return $this -> price;
  }
}

class Book extends Product {
  protected $pagesNum;

  public function setPagesNum($num) {
    $this -> pagesNum = $num;
  }

  public function getPagesNum() {
    return $this -> pagesNum;
  }
}

class Cd extends Product {
  protected $songsNum;

  public function setSongsNum($num) {
    $this -> songsNum = $num;
  }

  public function getSongsNum() {
    return $this -> songsNum;
  }
}

// SHOP PINCOPALLO*****************************************
$pincopallo = new Shop('Pincopallo shop', 'www.pincopalloshop.com', 'via degli Ulivi 33, Como');

echo "<b>creo l'oggetto pincopallo shop:</b>";
var_dump($pincopallo);

echo "<b>getter per valori di pincopallo shop: </b><br><br>";
echo '<em>nome</em> ' . $pincopallo -> getName() . '<br>';
echo '<em>sito web</em> ' . $pincopallo -> getWebsite() . '<br>';
echo '<em>sede</em> ' . $pincopallo -> getHeadquarters() . '<hr>';

// USER GIANNI***********************************************
$gianni = new User(5, 'Gianni', 'Rodari', '13/01/1951', 'gianni@mail.it');

echo "<b>creo l'oggetto user gianni:</b>";
var_dump($gianni);

echo "<b>getter per valori di gianni (prima di un acquisto): </b><br><br>";
echo '<em>nome</em> ' . $gianni -> getName() . '<br>';
echo '<em>cognome</em> ' . $gianni -> getSurname() . '<br>';
echo '<em>data di nascita</em> ' . $gianni -> getBirthdate() . '<br>';
echo '<em>mail</em> ' . $gianni -> getMail() . '<br>';
if (count($gianni -> getPurchasedProducts()) > 0) {
  echo $gianni -> getPurchasedProducts() . '<hr>';
} else {
  echo 'Gianni non ha ancora effettuato nessun acquisto. <br>';
}
if (count($gianni -> getCards()) > 0) {
  echo $gianni -> getCards() . '<hr>';
} else {
  echo 'Gianni non ha ancora registrato nessuna carta di credito. <hr>';
}

// BOOK PROMESSI SPOSI****************************************
$promessisposi = new Book(12, 'I promessi sposi', 'Alessandro Manzoni', 18.50);
$promessisposi -> setPagesNum(430);

echo "<b>creo l'oggetto book promessi sposi:</b>";
var_dump($promessisposi);

echo "<b>getter per valori di pincopallo shop: </b><br><br>";
echo '<em>autore</em> ' . $promessisposi -> getAuthor() . '<br>';
echo '<em>titolo</em> ' . $promessisposi -> getTitle() . '<br>';
echo '<em>prezzo</em> ' . $promessisposi -> getPrice() . '<br>';
echo '<em>numero pagine</em> ' . $promessisposi -> getPagesNum() . '<hr>';

// CREDIT CARD CARTAGIANNI***************************************
$cartagianni = new CreditCard(111222333, 'Gianni Rodari', 345, '25/05/2024');

echo "<b>creo l'oggetto credit card cartagianni:</b>";
var_dump($cartagianni);

echo "<b>getter per valori di cartagianni: </b><br><br>";
echo '<em>numero carta</em> ' . $cartagianni -> getCardNumber() . '<br>';
echo '<em>proprietario</em> ' . $cartagianni -> getHolder() . '<br>';
echo '<em>data di scadenza</em> ' . $cartagianni -> getExpirationDate() . '<hr>';

// GIANNI AGGIUNGE UNA CARTA DI CREDITO E COMPRA UN LIBRO*********
$gianni->addCard($cartagianni);
$gianni->buyProduct($promessisposi);

echo "<b>getter per valori di gianni (dopo un acquisto): </b><br><br>";
echo '<em>nome</em> ' . $gianni -> getName() . '<br>';
echo '<em>cognome</em> ' . $gianni -> getSurname() . '<br>';
echo '<em>data di nascita</em> ' . $gianni -> getBirthdate() . '<br>';
echo '<em>mail</em> ' . $gianni -> getMail() . '<br>';
if (count($gianni -> getPurchasedProducts()) > 0) {
  echo '<em>prodotti acquistati</em> ';
  print_r($gianni -> getPurchasedProducts());
  echo '<br>';
} else {
  echo 'Gianni non ha ancora effettuato nessun acquisto. <br>';
}
if (count($gianni -> getCards()) > 0) {
  echo '<em>carte collegate</em> ';
  print_r($gianni -> getCards());
  echo '<hr>';
} else {
  echo 'Gianni non ha ancora registrato nessuna carta di credito. <hr>';
}
