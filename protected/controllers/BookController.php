<?php
/**
 * Created by PhpStorm.
 * User: Максим
 * Date: 30.07.14
 * Time: 14:55
 */

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
        $a = Book::model()->exists('year>=:num', array(':num'=>$num));*/
        $ids = [2, 3];
        $a = Book::model()->findAllByPk($ids);
        $b=0;
    }
} 