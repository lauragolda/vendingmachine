<?php

function createProduct(string $name, int $price)
{
    $product = new stdClass();
    $product->name = $name;
    $product->price = $price;
    return $product;
}
function formatEur(int $amount): float{
    return ($amount/100);
}
//key is value and value is amount.
$coins = [
    200 => 50,
    100 => 100,
    50 => 200,
    20 => 250,
    10 => 300,
    5 => 100,
    2 => 70,
    1 => 90,
];

$products = [
    createProduct("Black coffee", 115),
    createProduct("Coffee with milk", 125),
    createProduct("Cappuccino", 135),
    createProduct("Hot chocolate", 119),
    createProduct("Green tea", 129),
    createProduct("Black tea", 139),
];
echo "Available products: " . PHP_EOL;
foreach ($products as $key => $product) {
    echo "[{$key}]{$product->name}" . " - " . formatEur($product -> price). "eur." . PHP_EOL;
}
echo "Please enter the number of the product you want to purchase: ";
$userChoice = readline();
$selectedProduct = $products[$userChoice];
if ($selectedProduct === null){
    echo 'Invalid selection' . PHP_EOL;
    exit;
}
echo "You have chosen {$selectedProduct -> name}, the amount you have to pay is " . formatEur($selectedProduct ->price) .  " eur. Please enter your coins: ";

$userMoney =0;


while ($userMoney < $selectedProduct->price) {
        $userCoins = (int)readline();
    if (! array_key_exists(($userCoins),$coins)){
        echo 'We do not accept this coin, take it back!'.PHP_EOL;
        continue;
    }
        $coins[$userCoins]++;
        $userMoney += formatEur($userCoins);
        echo "You have inserted {$userMoney} eur". PHP_EOL;
        echo "Please enter your coins: ";
}
//Īsti līdz galam kaut kas nestrādā. :(((
//Neesmu pārliecināta, kā dabūt to, lai izvada atlikumu monētās. :((

$change = $userMoney-$selectedProduct->price;

echo "Thank you for purchasing {$selectedProduct -> name}, here is your change: " . formatEur($change) . "eur" . PHP_EOL;



