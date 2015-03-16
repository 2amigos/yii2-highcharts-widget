<?php
/**
 *
 * HighChartsAssetTest.php
 *
 * Date: 16/03/15
 * Time: 12:45
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 */

namespace tests;


use dosamigos\highcharts\HighChartsAsset;
use yii\web\AssetBundle;

class HighChartsAssetTest extends TestCase
{
    public function testRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        HighChartsAsset::register($view);
        $this->assertEquals(2, count($view->assetBundles));
        $this->assertArrayHasKey('yii\\web\\JqueryAsset', $view->assetBundles);
        $this->assertTrue(
            $view->assetBundles['dosamigos\\highcharts\\HighChartsAsset'] instanceof AssetBundle
        );
        $content = $view->renderFile('@tests/data/views/rawlayout.php');
        $this->assertContains('jquery.js', $content);
        $this->assertContains('highcharts.src.js', $content);
    }
}