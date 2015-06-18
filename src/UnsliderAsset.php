<?php

namespace branchonline\unslider;

use yii\web\AssetBundle;

class UnsliderAsset extends AssetBundle {

	public $sourcePath = '@bower/jquery.unslider/src';

	public $baseUrl = '';

        public $js = [
            'unslider.min.js',
        ];

        public $depends = [
            'yii\web\JqueryAsset',
        ];

}

