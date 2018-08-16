<?php

namespace branchonline\unslider;

use yii\web\AssetBundle;

class MoveAsset extends AssetBundle {

    public $sourcePath = '@vendor/branchonline/yii2-unslider/src/assets';

    public $js = [
        'js/jquery.event.move.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

}
