<?php
/**
 * @copyright Copyright (c) 2013-2017 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\highcharts;

use yii\web\AssetBundle;

/**
 * Class HighChartsAsset
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\highcharts
 */
class HighChartsAsset extends AssetBundle
{
    public $sourcePath = '@bower/highcharts-release/';

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public $js = [
        'highcharts.src.js',
    ];
}
