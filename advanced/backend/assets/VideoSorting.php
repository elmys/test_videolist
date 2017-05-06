<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class VideoSorting extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [
        'js/video_sorting.js'
    ];
    public $depends = [
        'yii\jui\JuiAsset',
    ];
}
