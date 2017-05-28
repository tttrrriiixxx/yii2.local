<?php
/**
 * Created by PhpStorm.
 * User: TRIX
 * Date: 23.11.16
 * Time: 21:21
 */

namespace app\models;

use yii\db\ActiveRecord;


class Category  extends ActiveRecord
{
    public static function tableName(){
        return 'category';
    }

    public function getProduct(){
        return $this->hasMany(Product::className(),['category_id'=>'id']);
    }
}