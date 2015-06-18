<?php
namespace branchonline\unslider;

use yii\web\AssetBundle;

class UnsliderDefaultAsset extends AssetBundle {

	public $sourcePath = '@vendor/branchonline/yii2-unslider/src/assets';

	public $baseUrl = '';

        public $css = [
            'css/style.css',
        ];

        public $depends = [
            'yii\web\JqueryAsset',
            'branchonline\unslider\UnsliderAsset',
        ];

}

