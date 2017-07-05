<?php
/**
 * @copyright Copyright (c) 2013-2017 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\highcharts;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * HighCharts widget renders a HighCharts JS chart
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\highcharts
 */
class HighCharts extends Widget
{
    /**
     * @var array the HTML attributes for the links container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    /**
     * @var array the options for the HighCharts plugin. Default options have exporting enabled.
     * Please refer to the HighCharts plugin Web page for possible options.
     * @see http://api.highcharts.com/highcharts
     */
    public $clientOptions = [];
    /**
     * @var bool Set to true to enable 3D support.
     */
    public $enable3d = false;
    /**
     * @var bool Set to true to enable support for more chart types.
     */
    public $enableMore = false;
    /**
     * @var array the modules to register. The modules need to point to the name of the modules available under
     * @vendor/2amigos/yii2-highcharts-widget/assets/vendor/modules. Only the filename (ie `drilldown.js`) that is very
     * important.
     */
    public $modules = [];
    /**
     * @var bool
     */
    private $_renderTo;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        $this->clientOptions = ArrayHelper::merge(
            [
                'exporting' => [
                    'enabled' => true
                ]
            ],
            $this->clientOptions
        );

        if (ArrayHelper::getValue($this->clientOptions, 'exporting.enabled')) {
            $this->modules[] = 'exporting.js';
        }

        $this->_renderTo = ArrayHelper::getValue($this->clientOptions, 'chart.renderTo');
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if (empty($this->_renderTo)) {
            echo Html::tag('div', '', $this->options);
            $this->clientOptions['chart']['renderTo'] = $this->options['id'];
        }
        $this->registerClientScript();
    }

    /**
     * Registers the script for the plugin
     */
    public function registerClientScript()
    {
        $view = $this->getView();

        $bundle = HighChartsAsset::register($view);
        $id = str_replace('-', '_', $this->options['id']);
        $options = $this->clientOptions;

        if ($this->enable3d) {
            $bundle->js[] = YII_DEBUG ? 'highcharts-3d.src.js' : 'highcharts-3d.js';
        }

        if ($this->enableMore) {
            $bundle->js[] = YII_DEBUG ? 'highcharts-more.src.js' : 'highcharts-more.js';
        }

        foreach ($this->modules as $module) {
            $bundle->js[] = "modules/{$module}";
        }

        if ($theme = ArrayHelper::getValue($options, 'theme')) {
            $bundle->js[] = "themes/{$theme}.js";
        }

        $options = Json::encode($options);

        $view->registerJs(";var highChart_{$id} = new Highcharts.Chart({$options});");
    }
}
