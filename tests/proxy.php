<?php


/**
 * @author lin <465382251@qq.com>
 * 
 * Fill in your key and secret and pass can be directly run
 * 
 * Most of them are unfinished and need your help
 * https://github.com/zhouaini528/huobi-php.git
 * */
use Lin\Binance\Binance;

require __DIR__ .'../../vendor/autoload.php';

include 'key_secret.php';

$binance=new Binance($key,$secret);

//If you are developing locally and need an agent, you can set this
$binance->setProxy();

//More flexible Settings
$binance->setProxy([
    'http'  => 'http://127.0.0.1:12333',
    'https' => 'http://127.0.0.1:12333',
]);

//Get all account orders; active, canceled, or filled.
try {
    $result=$binance->user()->getAllOrders([
        'symbol'=>'BTCUSDT',
        'limit'=>'20',
        //'orderId'=>'',
        //'startTime'=>'',
        //'endTime'=>'',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}


