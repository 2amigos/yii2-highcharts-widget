<?php
/**
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
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
    public $sourcePath = '@vendor/bower/highcharts-release/';

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init()
    {
        $this->js[] = YII_DEBUG ? 'highcharts.src.js' : 'highcharts.js';
    }
}