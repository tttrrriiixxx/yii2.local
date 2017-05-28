<?php
/**
 * Created by PhpStorm.
 * User: TRIX
 * Date: 14.12.16
 * Time: 15:28
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController
{
    public function actionIndex(){
        $hits=Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER');
//        debug($hits);
        return $this->render('index',compact('hits'));
    }

    public function actionView(){
        $id=Yii::$app->request->get('id');
//        $products = Product::find()->with('category')->where(['Category_id' =>  $id])->all();//жадная загрузка
//        $products = Product::find()->where(['Category_id' =>  $id])->all();
        $query = Product::find()->where(['category_id' =>  $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $category = Category::findOne($id);
        $this->setMeta( 'E-SHOPPER | ' . $category->name , $category->keywords, $category->description);

        return $this->render('view', compact('products', 'pages','category'));
    }
}