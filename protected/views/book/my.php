<?php
/* @var $this BookController */

$this->breadcrumbs=array(
	'Book'=>array('/book'),
	'My',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<?=
CHtml::image("/image.jpg", "Моя картинка", array('title'  => 'Мой title',
                                                 "class"  => "first",
                                                 "width"  => 500,
                                                 "height" => 300)) ?>
<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
