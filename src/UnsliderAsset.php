<?php

namespace branchonline\unslider;

use yii\web\AssetBundle;

class UnsliderAsset extends AssetBundle {

	public $sourcePath = '@bower/jquery.unslider/dist';

	public $baseUrl = '';

        public $js = [
            'js/unslider-min.js',
        ];

        public $depends = [
            'yii\web\JqueryAsset',
        ];

}

