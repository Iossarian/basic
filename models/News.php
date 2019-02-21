<?php

namespace app\models;

use Yii;
use yii\helpers\StringHelper;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $date
 * @property string $image
 */
class News extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text', 'category_id'], 'required'],
            [['title'],'string','min'=>5,'max'=>20],
            [['title', 'text', 'image'], 'string'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['date'], 'safe'],
            [['date'], 'date', 'format' => 'php:Y-m-d H:i:s'],
            [['date'], 'default', 'value' => date('Y-m-d H:i:s')],
            [['image'], 'default', 'value' => null],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
            'date' => Yii::t('app', 'Date'),
            'image' => Yii::t('app', 'Image'),
            'category_id' => Yii::t('app', 'Category'),
        ];
    }

    public function getCategory () {
        return $this->hasOne(\app\models\Categories::className(), ['id' => 'category_id']);
    }

    public function uploadAndSave () {
        if ($this->validate()) {
            if (isset($this->imageFile)) {
                $this->image = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
                $this->imageFile->saveAs($this->image);
            }
            return $this->save(false);
        }
        return false;
    }



    /**
     * {@inheritdoc}
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
}
