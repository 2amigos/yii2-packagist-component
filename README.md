Packagist API wrapper component extension for Yii2
======================

Component extension wrapper for [Packagist API](http://packagist.org/)

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

> If you are looking for Yii 2.* version please check [its own repository](https://github.com/2amigos/yii2-packagist-component)

Either run

```
php composer.phar require "2amigos/yii2-packagist-component" "*"
```
or add

```json
"2amigos/yii2-packagist-component" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----

```
use dosamigos\packagist\Packagist;

$api = new Packagist;

// get a package information  
$response = $api->package('yiisoft/yii2`)->getResponse();  
// dump response  
var_dump($response->body);

// get a filtered list  
$response = $api->all(['vendor' => '2amigos'])->getResponse();
if($response->isSuccessFul) {
    var_dump($response->body);
} else {
    var_dump($response->error);
}

// search packages
$response = $api->search('yii2')->getResponse();  
var_dump($response->body);  
```


> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)

<i>Web development has never been so fun!</i>
[www.2amigos.us](http://www.2amigos.us)