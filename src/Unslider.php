<?php

namespace branchonline\unslider;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;
use branchonline\unslider\UnsliderAsset;
use branchonline\unslider\ResizeAsset;

/**
 * Widget for Unslider jQuery plugin
 *
 * ```php
 * use branchonline\unslider\Unslider;
 * echo Unslider::widget([
 *     'options' => [
 *         'nav' => false,
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
    public $selector = '.banner';

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
        'nav' => true,
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

        $slider = Html::beginTag('div', ['class' => implode(' ', $this->css_container_classes)]);
        $slider .= Html::beginTag('ul');
        foreach ($this->slides as $slide) {
            $content = '';
            $content .= isset($slide['title']) ? Html::tag('h1', $slide['title'], ['class' => 'unslider-title']) : null;
            $content .= isset($slide['body']) ? Html::tag('p', $slide['body'], ['class' => 'unslider-body']) : null;
            $content .= isset($slide['button']) ? Html::a($slide['button']['title'], $slide['button']['href'],
                ['class' => $slide['button']['class']]
            ) : null;
            $content = Html::tag('div', Html::tag('tr', Html::tag('td', $content)), ['class' => 'inner__table__content']);
            $content = Html::tag('div', $content, ['class' => 'inner__table']);
            $content = Html::tag('div', $content, ['class' => 'inner']);
            $content .= Html::tag('div', '', ['class' => 'hero__image', 'style' => 'background-image: url(' . str_replace(')', '\)', str_replace('(', '\(', str_replace(' ', '\ ', $slide['img']))) . ');']);
            $classes = (empty($slide['classes']) ? [] : $slide['classes']);
            $slider .= Html::tag('li', $content, ['class' => implode(' ', $classes), ]);
        }
        $slider .= Html::endTag('ul');
        $slider .= Html::endTag('div');

        return $slider;
    }

    protected function registerAssets() {
        $view = $this->getView();
        UnsliderAsset::register($view);
        if($this->use_default_styling) {
            UnsliderStylingAsset::register($view);
        }
        
        if (count($this->slides) <= 1) {
            $this->options['nav'] = false;
        }

        $options = Json::encode($this->options);
        $view->registerJs("jQuery('$this->selector').unslider($options);");
    }

    /**
     * Get classes for the button element
     *
     * @return string button css classes
     */
    protected function getButtonCssClasses() {
        return implode(' ', $this->css_button_classes);
    }

}
