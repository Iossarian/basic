<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aggregate_rating".
 *
 * @property int $id
 * @property int $model_id
 * @property int $target_id
 * @property int $likes
 * @property int $dislikes
 * @property double $rating
 */
class AggregateRating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aggregate_rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model_id', 'target_id', 'likes', 'dislikes', 'rating'], 'required'],
            [['model_id', 'target_id', 'likes', 'dislikes'], 'integer'],
            [['rating'], 'number'],
            [['model_id', 'target_id'], 'unique', 'targetAttribute' => ['model_id', 'target_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'model_id' => Yii::t('app', 'Model ID'),
            'target_id' => Yii::t('app', 'Target ID'),
            'likes' => Yii::t('app', 'Likes'),
            'dislikes' => Yii::t('app', 'Dislikes'),
            'rating' => Yii::t('app', 'Rating'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return AggregateRatingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AggregateRatingQuery(get_called_class());
    }
}
