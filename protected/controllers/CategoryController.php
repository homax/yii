<?php

class CategoryController extends Controller
{

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
        );
    }

	public function actionIndex($id)
	{
        $models = Pages::model()->findAllByAttributes(array('category_id'=>$id));
        $category = Categories::model()->findByPk($id);
		$this->render('index', array('models'=>$models, 'category'=>$category));
	}

    public function actionView($id)
    {
        $model = Pages::model()->findByPk($id);

        $newComment = new Comments();
        if(Yii::app()->user->isGuest)
            $newComment->setScenario('guest');

        if(isset($_POST['Comments']))
        {
            $setting = Setting::model()->findByPk(1);
            $newComment->attributes=$_POST['Comments'];
            $newComment->page_id=$model->id;
            $newComment->status = ($setting->defaultStatusComment == 0) ? 0 : 1;
            if($newComment->save()) {
                if($setting->defaultStatusComment == 0)
                    Yii::app()->user->setFlash('comment','Комментарий опубликован');
                else
                    Yii::app()->user->setFlash('comment','Ждите подтверждения комментария');
                $this->refresh();
            }
        }

        $this->render('view', array('model'=>$model, 'newComment'=>$newComment));
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