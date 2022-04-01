composer require abyzs/privatcoollib

use Abyzs\PrivatCoolLib\ExchangeAmount;

$exchange = new ExchangeAmount("USD", "UAH", 100);

var_dump($exchange->toDecimal())