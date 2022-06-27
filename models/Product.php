<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string $price
 * @property string $year
 * @property string $country
 * @property string $model
 * @property string $image
 * @property string $count
 * @property string $date
 * @property int $id_category
 *
 * @property Category $category
 * @property OrderItem[] $orderItems
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'year', 'country', 'model', 'image', 'count', 'id_category'], 'required'],
            [['date'], 'safe'],
            [['id_category'], 'integer'],
            [['title', 'price', 'year', 'country', 'model', 'image', 'count'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Наименование',
            'price' => 'Цена',
            'year' => 'Год производства',
            'country' => 'Страна производства',
            'model' =>'Модель',
            'image' => 'Изображение',
            'count' => 'Количество на складе',
            'date' => 'Date',
            'id_category' => 'Id Category',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    
   public static function getImages()
    {
        return (new \yii\db\Query())
                            ->select(['title','image'])
                            ->from('product')
                            ->orderBy('date DESC')
                            ->limit(5)
                            ->all()
                            ;
    }

}
