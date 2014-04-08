HighCharts JS Widget for Yii2
=============================

The amazing [HighCharts JS](http://www.highcharts.com/) widget now for Yii2.

Highcharts is one of the best HTML5/Javascritp charting libraries on the web. Highcharts JS is free for a non-commercial
project but not if you are developing a product that you are going to make money with.

Visit [HighCharts site](http://www.highcharts.com/) in order to get more information about the different options of this
plugin and its [license pricing](http://shop.highsoft.com/highcharts.html).

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "2amigos/yii2-highcharts-librar" "*"
```
or add

```json
"2amigos/yii2-highcharts-library" : "*"
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
        )
    ]
]);
// ... 
```

Further Information
-------------------
Please, check the [HighCharts site](http://www.highcharts.com/) documentation for further
information about its configuration options.

> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)  
<i>Web development has never been so fun!</i>
[www.2amigos.us](http://www.2amigos.us)