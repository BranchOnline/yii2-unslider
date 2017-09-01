<?php

namespace branchonline\unslider;

use yii\web\AssetBundle;

class UnsliderAsset extends AssetBundle {

    public $sourcePath = '@bower/jquery.unslider/dist';

    public $js = [
        'js/unslider-min.js',
    ];

    public $depends = [
        'branchonline\unslider\SwipeAsset',
        'yii\web\JqueryAsset',
    ];

}

