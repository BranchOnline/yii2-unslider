<?php

namespace branchonline\unslider;

use yii\web\AssetBundle;

class SwipeAsset extends AssetBundle {

    public $sourcePath = '@bower/jquery.event.swipe/js';

    public $js = [
        'jquery.event.swipe.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'branchonline\unslider\MoveAsset'
    ];

}
