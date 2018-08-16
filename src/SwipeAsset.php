<?php

namespace branchonline\unslider;

use yii\web\AssetBundle;

class SwipeAsset extends AssetBundle {

    public $sourcePath = '@vendor/branchonline/yii2-unslider/src/assets';

    public $js = [
        'js/jquery.event.swipe.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'branchonline\unslider\MoveAsset'
    ];

}
