<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phone_book".
 *
 * @property int $id
 * @property int $user_id
 * @property int $phone_book_type_id
 * @property string $name
 * @property string $surname
 * @property string|null $middle_name
 * @property string $phone
 * @property string|null $description
 *
 * @property PhoneBookType $phoneBookType
 * @property User $user
 */
class PhoneBook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phone_book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_book_type_id', 'name', 'surname', 'phone'], 'required'],
            [['user_id', 'phone_book_type_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'surname', 'middle_name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 18],
            [['user_id', 'phone'], 'unique', 'targetAttribute' => ['user_id', 'phone']],
            [['phone_book_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PhoneBookType::className(), 'targetAttribute' => ['phone_book_type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'phone_book_type_id' => 'Группа',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'middle_name' => 'Отчество',
            'phone' => 'Телефон',
            'description' => 'Описание',
        ];
    }

    /**
     * Gets query for [[PhoneBookType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhoneBookType()
    {
        return $this->hasOne(PhoneBookType::className(), ['id' => 'phone_book_type_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->user_id = Yii::$app->user->identity->id;
        }

        return parent::beforeSave($insert);
    }
}
