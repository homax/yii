<?php

class CategoryController extends Controller
{
	public function actionIndex($id)
	{
        $models = Pages::model()->findAllByAttributes(array('category_id'=>$id));
        $category = Categories::model()->findByPk($id);
		$this->render('index', array('models'=>$models, 'category'=>$category));
	}

    public function actionView($id)
    {
        $model = Pages::model()->findByPk($id);
        $this->render('view', array('model'=>$model));
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