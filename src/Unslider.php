<?php

namespace branchonline\unslider;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;
use branchonline\unslider\UnsliderAsset;
use branchonline\unslider\UnsliderDefaultAsset;

/**
 * Widget for Unslider jQuery plugin
 *
 * ```php
 * use branchonline\unslider\Unslider;
 * echo Unslider::widget([
 *     'options' => [
 *         'dots' => false,
 *         'keys' => true,
 *         'fluid' => true
 *      ],
 *      'slides' => [
 *           [
 *               'img' => 'http://unslider.com/img/sunset.jpg',
 *               'title' => 'Yii2 PHP Framework',
 *               'body' => 'Unslider widget for Yii2',
 *               'button' => ['title' => 'Title', 'href' => '#href', 'class' => 'btn']
 *           ],
 *           [
 *               'img' => 'http://unslider.com/img/subway.jpg',
 *               'title' => 'Another image',
 *               'body' => 'description',
 *               'button' => ['title' => 'Title', 'href' => '#href', 'class' => 'btn']
 *           ]
 * ]]);
 *```
 *
 * @author Jap Mul <jap@branchonline.nl>
 */
class Unslider extends Widget {

    public $use_default_styling = true;

    /**
     * @var string selector used for jquery
     */
    public $selector = 'banner';

    /**
     * @var array available css classes
     */
    public $css_container_classes = ['banner'];

    /**
     * @var array available css classes
     */
    public $css_button_classes = ['btn'];

    /**
     * @var array slide data. See this class description for an example.
     */
    public $slides = [];

    /**
     * @var array options passed to the unslider jquery plugin.
     */
    public $options = [
        'dots' => true,
        'keys' => false,
        'fluid' => true
    ];

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run() {
        $this->registerAssets();

        $slider = Html::beginTag('div', ['class' => $this->getContainerCssClasses()]);
        $slider .= Html::beginTag('ul');
        foreach ($this->slides as $slide) {
            $slider .= '<li style="background-image: url(' . $slide['img'] . ')">';
            $slider .= Html::beginTag('div', ['class' => 'inner']);
            $slider .= isset($slide['title']) ? Html::tag('h1', $slide['title'], ['class' => 'unslider-title']) : null;
            $slider .= isset($slide['body']) ? Html::tag('p', $slide['body'], ['class' => 'unslider-body']) : null;
            $slider .= isset($slide['button']) ? Html::a($slide['button']['title'], $slide['button']['href'],
                ['class' => $slide['button']['class']]) : null;
            $slider .= Html::endTag('div');
            $slider .= '</li>';
        }
        $slider .= Html::endTag('ul');
        $slider .= Html::endTag('div');

        return $slider;
    }

    protected function registerAssets() {
        $view = $this->getView();
        UnsliderAsset::register($view);
        if($this->use_default_styling) {
            UnsliderDefaultAsset::register($view);
        }
        $options = Json::encode($this->options);
        $view->registerJs("jQuery('.$this->selector').unslider($options);");
    }

    /**
     * Get classes for the container element
     *
     * @return string container css classes
     */
    protected function getContainerCssClasses() {
        return $this->_flattenCssClasses($this->css_container_classes);
    }

    /**
     * Get classes for the button element
     *
     * @return string button css classes
     */
    protected function getButtonCssClasses() {
        return $this->_flattenCssClasses($this->css_container_classes);
    }

    /**
     * Flatten an array with implode. If the passed $css_classes is a string
     * then we return the param as is.
     * 
     * @param array|string $css_classes the provided css classes
     * @return string the flattend css classes
     */
    private function _flattenCssClasses($css_classes) {
        $flatend_css_classes = '';
        if(is_array($css_classes) && empty($css_classes)) {
            $flatend_css_classes = implode(' ', $css_classes);
        } else if (is_string($css_classes)) {
            $flatend_css_classes = $css_classes;
        }
        return $flatend_css_classes;
    }

}