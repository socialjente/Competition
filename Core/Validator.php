<?php

namespace Core;

class Validator
{
    public static function lock($lock)
    {
        $key = 'JenteIsAwesome';

        $locked = openssl_encrypt($lock, 'aes-256-cbc', $key, OPENSSL_RAW_DATA);

        return $locked;
    }

    public static function unlock($userName)
    {
        $key = 'JenteIsAwesome';

        $unlocked = openssl_decrypt($userName, 'aes-256-cbc', $key, OPENSSL_RAW_DATA);

        return $unlocked;
    }

    public static function length($value)
    {
        return strlen($value) >= 3;
    }

    public static function exists($db, $userName)
    {
        $exists = $db->query("SELECT id FROM users WHERE BINARY user_name = ?", [$userName])->find();

        return $exists;
    }

    public static function correct($db, $userName, $password)
    {
        $result = $db->query("select id from users where user_name = :username and password = :password", [
            'username' => $userName,
            'password' => $password,
        ])->find();

        return !!$result;
    }














    public static function firstTime($db, $userName, $password)
    {
        $result = $db->query("select new from users where user_name = :username and password = :password", [
            'username' => $userName,
            'password' => $password,
        ])->find();

        return !!$result;
    }

    public static function abuse($userName)
    {
        if ((isset($_COOKIE['lock'])) and (Validator::unlock($_COOKIE['lock']) === $userName)) {
            return $userName;
        }
    }





    public static function defPassword($password)
    {
        if ($password === 'Password1234') {
            return $password;
        }
    }


    public static function defPasswordHELP($db, $userName)
    {
        $password = 'Password1234';

        $exists = $db->query("SELECT password FROM users WHERE BINARY user_name = ?", [$userName])->find();

        if ((!empty($exists)) and (in_array($password, $exists))) {
            return $password;
        }
    }
    public static function defaultPassword($db, $userName, $password)
    {
        if ($password === 'Password1234') {
            $exists = $db->query("SELECT password FROM users WHERE BINARY user_name = ?", [$userName])->find();

            if ((!empty($exists)) and (in_array('Password1234', $exists))) {
                return $exists;
            }
        }
    }

    public static function passwordSomething($db, $userName, $password)
    {
        $exists = $db->query("SELECT password FROM users WHERE BINARY user_name = ?", [$userName])->find();

        if ((!empty($exists)) and (in_array($password, $exists))) {
            return $password;
        }
    }





















    // OLD code
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
