<?php

namespace branchonline\unslider;

use yii\web\AssetBundle;

/**
 * Loads in the resize js.
 *
 * @author Fons Eppink <fons@branchonline.nl>
 */
class ResizeAsset extends AssetBundle {

    /** @inheritdoc */
    public $sourcePath = '@vendor/branchonline/yii2-unslider/src/assets';

    /** @inheritdoc */
    public $js = [
        'js/unslider-resize.js',
    ];

    /** @inheritdoc */
    public $depends = [
        'yii\web\JqueryAsset',
        'branchonline\unslider\UnsliderAsset',
    ];

}
