<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $role
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'role'], 'required'],
            [['username'], 'unique', 'message' => 'Login already exists.'],
            [['role'], 'integer'],
            [['username', 'password'], 'string', 'max' => 255],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'role' => 'Role',
        ];
    }

    public static function findByUsername($username)
    {
        $users = self::find()->all();
        foreach ($users as $user)
        {
            if (strcasecmp($user['username'], $username) === 0)
            {
                return new static($user);
            }
        }

        return null;
    }
}
}
