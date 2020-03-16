<?php
namespace App;

use Symfony\Component\HttpFoundation\Cookie;

class User extends API
{
    protected $guarded = [];
    public static $token;

    public static function me()
    {
        return (new static)->cache('me');
    }

    public static function auth($params = [])
    {
        return (new static)->execute('auth', $params, 'post');
    }
    public static function register(array $params = [])
    {
        return (new static)->execute('register', $params, 'post');
    }
    public static function verification(array $params = [])
    {
        return (new static)->execute('auth/verification', $params, 'post');
    }
    public static function authAs($user, $params = [])
    {
        return (new static)->execute('auth/as/'. $user, $params, 'get');
    }
    public static function authBack($params = [])
    {
        return (new static)->execute('auth/back', $params, 'post');
    }

    public static function authTheory($key, array $parameters = [])
    {
        return (new static)->execute("auth/theory/$key", $parameters, 'post');
    }
    public static function recovery(array $parameters = [])
    {
        return (new static)->execute("auth/recovery", $parameters, 'post');
    }
    public function isAdmin()
    {
        return $this->type == 'admin';
    }
}
