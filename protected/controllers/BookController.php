<?php

class BookController extends Controller
{
	public function actionIndex()
	{
        /*$a = Book::model()->findByPk(3);
        $num = 3;
        $a = Book::model()->find('id<:num', array(':num'=>$num));
        $a = Book::model()->findByAttributes(array('id' => array(1, 2, 3), 'title' => 'Война и мир'));
        $a = Book::model()->findAllByAttributes(array('id' => array(1, 2, 3), 'title' => 'Война и мир'));
        $num = 1900;
        $a = Book::model()->exists('year>=:num', array(':num'=>$num));
        $ids = [2, 3];
        $a = Book::model()->findAllByPk($ids);
        $b=0;
        echo 1;*/
		$this->render('index');
	}

	public function actionMy()
	{
		$this->render('my');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}