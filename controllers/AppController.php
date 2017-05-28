<?php
/**
 * Created by PhpStorm.
 * User: TRIX
 * Date: 14.12.16
 * Time: 15:25
 */

namespace app\controllers;

use  yii\web\Controller;

class AppController extends Controller
{
    protected function setMeta($title = null, $keywords = null, $description = null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name'=>'keywords','content'=>"$keywords"]);
        $this->view->registerMetaTag(['name'=>'description','content'=>"$description"]);
    }

}