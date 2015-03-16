<?php
/**
 *
 * HighChartsTest.php
 *
 * Date: 16/03/15
 * Time: 12:51
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 */

namespace tests;


use dosamigos\highcharts\HighCharts;
use tests\data\overrides\TestHighCharts;
use yii\web\View;

class HighChartsTest extends TestCase
{
    protected $config = [];

    public function setUp()
    {
        parent::setUp();
        $this->config = [
            'id' => 'test-highcharts',
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
        ];
    }

    public function testRenderContainer()
    {
        $out = HighCharts::widget($this->config);

        $expected = '<div id="test-highcharts"></div>';
        $this->assertEqualsWithoutLE($expected, $out);
    }

    public function testThemes()
    {
        $view = $this->getView();

        $config = $this->config;
        $config['clientOptions']['theme'] = 'dark-blue';
        $widget = HighCharts::begin($config);

        $widget->setView($view);
        $widget->run();

        $content = $view->renderFile('@tests/data/views/rawlayout.php');

        $this->assertContains('themes/dark-blue.js', $content);
    }

    public function testModules()
    {
        $view = $this->getView();

        $config = $this->config;
        $config['modules'][] = 'drilldown.js';
        $widget = HighCharts::begin($config);

        $widget->setView($view);
        $widget->run();

        $content = $view->renderFile('@tests/data/views/rawlayout.php');

        $this->assertContains('modules/drilldown.js', $content);
    }

    public function testRegisterClientScript()
    {
        $class = new \ReflectionClass('tests\\data\\overrides\\TestHighCharts');
        $method = $class->getMethod('registerClientScript');
        $method->setAccessible(true);

        $widget = TestHighCharts::begin($this->config);
        $view = $this->getView();
        $widget->setView($view);
        $method->invoke($widget);

        $test = <<<JS
;var highChart_test_highcharts = new Highcharts.Chart({"exporting":{"enabled":true},"chart":{"type":"bar"},"title":{"text":"Fruit Consumption"},"xAxis":{"categories":["Apples","Bananas","Oranges"]},"yAxis":{"title":{"text":"Fruit eaten"}},"series":[{"name":"Jane","data":[1,0,4]},{"name":"John","data":[5,7,3]}]});
JS;
        $this->assertEquals($test, $view->js[View::POS_READY]['test-highcharts-js']);
    }
}