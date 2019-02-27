<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wishes".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $date
 * @property int $author_id
 */
class Wishes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wishes';
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->date = date('y-m-d', strtotime($this->date));
            return true;
        }

    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['title', 'text'], 'string'],
            [['date'], 'safe'],
            [['date'], 'date', 'format' => "dd.MM.yyyy", 'min' => date("d.m.Y", strtotime('+1 days'))],
            [['date'], 'default', 'value' => date('y-m-d')],
            [['author_id'], 'default', 'value' => Yii::$app->user->identity->id],
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
            'author_id' => Yii::t('app', 'Author ID'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return WishesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WishesQuery(get_called_class());
    }

    public function getRating () {
        return $this->hasOne(\app\models\AggregateRating::className(), ['target_id' => 'id']);
    }
}
