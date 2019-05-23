<?php

declare(strict_types=1);

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\web\IdentityInterface;

final class User extends BaseObject implements IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static function getUsers(): array
    {
        return [
            '100' => [
                'id' => '100',
                'username' => 'admin',
                'password' => Yii::$app->params['admin_password_hash'],
                'authKey' => 'test100key',
                'accessToken' => '100-token',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id): ?self
    {
        return isset(self::getUsers()[$id]) ? new static(self::getUsers()[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null): ?self
    {
        foreach (self::getUsers() as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username): ?self
    {
        foreach (self::getUsers() as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password): bool
    {
        $app = Yii::$app;

        return $app->security->validatePassword(
            $password,
            $app->params['admin_password_hash']
        );
    }
}
