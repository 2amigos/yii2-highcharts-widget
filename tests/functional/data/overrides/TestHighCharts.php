<?php
/**
 *
 * TestTinyMce.php
 *
 * Date: 06/03/15
 * Time: 14:00
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 */

namespace tests\data\overrides;

use dosamigos\highcharts\HighCharts;
use dosamigos\highcharts\HighChartsAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\View;

class TestHighCharts extends HighCharts
{
    public function registerClientScript()
    {
        $view = $this->getView();

        $bundle = HighChartsAsset::register($view);
        $id = str_replace('-', '_', $this->options['id']);
        $options = $this->clientOptions;

        foreach ($this->modules as $module) {
            $bundle->js[] = "modules/{$module}";
        }

        if ($theme = ArrayHelper::getValue($options, 'theme')) {
            $bundle->js[] = "themes/{$theme}.js";
        }

        $options = Json::encode($options);

        $view->registerJs(
            ";var highChart_{$id} = new Highcharts.Chart({$options});",
            View::POS_READY,
            'test-highcharts-js'
        );
    }
}