<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phone_book_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property PhoneBook[] $phoneBooks
 */
class PhoneBookType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phone_book_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
        ];
    }

    /**
     * Gets query for [[PhoneBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhoneBooks()
    {
        return $this->hasMany(PhoneBook::className(), ['user_id' => 'id']);
    }
}
