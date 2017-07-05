HighCharts JS Widget for Yii2
=============================

[![Latest Version](https://img.shields.io/github/tag/2amigos/yii2-highcharts-widget.svg?style=flat-square&label=release)](https://github.com/2amigos/yii2-highcharts-widget/tags)
[![Software License](https://img.shields.io/badge/license-BSD-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/2amigos/yii2-highcharts-widget/master.svg?style=flat-square)](https://travis-ci.org/2amigos/yii2-highcharts-widget)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/2amigos/yii2-highcharts-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-highcharts-widget/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/2amigos/yii2-highcharts-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-highcharts-widget)
[![Total Downloads](https://img.shields.io/packagist/dt/2amigos/yii2-highcharts-widget.svg?style=flat-square)](https://packagist.org/packages/2amigos/yii2-highcharts-widget)

The amazing [HighCharts JS](http://www.highcharts.com/) widget now for Yii2.

Highcharts is one of the best HTML5/Javascript charting libraries on the web. Highcharts JS is free for a non-commercial
project but not if you are developing a product that you are going to make money with.

Visit [HighCharts site](http://www.highcharts.com/) in order to get more information about the different options of this
plugin and its [license pricing](http://shop.highsoft.com/highcharts.html).

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require 2amigos/yii2-highcharts-widget:~1.0
```
or add

```json
"2amigos/yii2-highcharts-widget" : "~1.0"
```

to the require section of your application's `composer.json` file.


Usage
-----

```
// on your view

<?=
\dosamigos\highcharts\HighCharts::widget([
    'clientOptions' => [
        'chart' => [
                'type' => 'bar'
        ],
        'title' => [
             'text' => 'Fruit Consumption'
             ],
        'xAxis' => [
            'categories' => [
                'Apples',
                'Bananas',
                'Oranges'
            ]
        ],
        'yAxis' => [
            'title' => [
                'text' => 'Fruit eaten'
            ]
        ],
        'series' => [
            ['name' => 'Jane', 'data' => [1, 0, 4]],
            ['name' => 'John', 'data' => [5, 7, 3]]
        ]
    ]
]);
// ... 
```

Further Information
-------------------
Please, check the [HighCharts site](http://www.highcharts.com/) documentation for further
information about its configuration options.

## Using code fixer

We have added a PHP code fixer to standardize our code. It includes Symfony, PSR2 and some contributors rules. 

```bash 
./vendor/bin/php-cs-fixer fix ./src --config .php_cs
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Antonio Ramirez](https://github.com/tonydspaniard)
- [All Contributors](../../contributors)

## License

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.

> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)  
<i>Custom Software | Web & Mobile Software Development</i>  
[www.2amigos.us](http://www.2amigos.us)
