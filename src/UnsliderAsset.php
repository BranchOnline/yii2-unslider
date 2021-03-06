<?php

namespace branchonline\unslider;

use yii\web\AssetBundle;

class UnsliderAsset extends AssetBundle {

    public $sourcePath = '@vendor/branchonline/yii2-unslider/src/assets';

    public $js = [
        'js/unslider-min.js',
    ];

    public $depends = [
        'branchonline\unslider\SwipeAsset',
        'yii\web\JqueryAsset',
    ];

}

