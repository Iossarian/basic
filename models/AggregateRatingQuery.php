<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AggregateRating]].
 *
 * @see AggregateRating
 */
class AggregateRatingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AggregateRating[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AggregateRating|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
