<?php
/**
 * Created by PhpStorm.
 * User: TRIX
 * Date: 23.11.16
 * Time: 21:21
 */

namespace app\models;

use yii\db\ActiveRecord;


class Product  extends ActiveRecord
{
    public static function tableName(){
        return 'product';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }
}