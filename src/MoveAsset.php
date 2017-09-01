<?php

namespace branchonline\unslider;

use yii\web\AssetBundle;

class MoveAsset extends AssetBundle {

    public $sourcePath = '@bower/jquery.event.move/js';

    public $js = [
        'jquery.event.move.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

}
