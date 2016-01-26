<?php
namespace branchonline\unslider;

use yii\web\AssetBundle;

/**
 * Class UnsliderStylingAsset Defines default unslider styling.
 * @author Dennis Wethmar <dennis@branchonline.nl>
 */
class UnsliderStylingAsset extends AssetBundle {

    /** @inheritdoc */
    public $sourcePath = '@bower/jquery.unslider/dist';

    /** @inheritdoc */
    public $css = [
        'css/unslider.css',
    ];

}

