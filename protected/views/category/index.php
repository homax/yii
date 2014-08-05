<?php
/* @var $this CategoryController */

$this->breadcrumbs=array(
	'Категория',
    $category->title,
);
?>
<?php
foreach ($models as $one) {
    echo CHtml::link("<h3>".$one->title."</h3>", array('view', 'id'=>$one->id));
    echo substr($one->content, 0, 60);
    echo CHtml::link("Читать далее...", array('view', 'id'=>$one->id));
    echo "<br><hr><br>";
}
if(!$models)
    echo 'В данной категории статей нет';

?>
