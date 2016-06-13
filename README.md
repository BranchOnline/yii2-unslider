# yii2-unslider
Unslider slider widget for Yii2

Installation
------------

Add the following to `require` section of your `composer.json`:

```
"branchonline/yii2-unslider": "*"
```

and run `composer install`.

Usage
-----

```php
  use branchonline\unslider\Unslider;
  echo Unslider::widget([
      'options' => [
          'nav' => false,
          'keys' => true,
          'fluid' => true
       ],
       'slides' => [
            [
                'img' => 'http://unslider.com/img/sunset.jpg',
                'title' => 'Yii2 PHP Framework',
                'body' => 'Unslider widget for Yii2',
                'button' => ['title' => 'Title', 'href' => '#href', 'class' => 'btn']
            ],
            [
                'img' => 'http://unslider.com/img/subway.jpg',
                'title' => 'Another image',
                'body' => 'description',
                'button' => ['title' => 'Title', 'href' => '#href', 'class' => 'btn']
            ]
  ]]);

```
