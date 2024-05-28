<?php

namespace app\classes;

class Csrf
{
    private $length = 32;
    private static $token_exp_key = 'csrf_token_exp';
    private static $code_exp_key = 'csrf_code_exp';
    private $token;
    private $code;

    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['csrf_token']) || !isset($_SESSION[self::$token_exp_key]) || $_SESSION[self::$token_exp_key] < time()) {
            $this->generate();
            $_SESSION['csrf_token'] = $this->token;
            $_SESSION[self::$token_exp_key] = time() + 180;
        } else {
            $this->token = $_SESSION['csrf_token'];
        }

        if (!isset($_SESSION['csrf_code']) || !isset($_SESSION[self::$code_exp_key]) || $_SESSION[self::$code_exp_key] < time()) {
            $this->generateCode();
            $_SESSION['csrf_code'] = $this->code;
            $_SESSION[self::$code_exp_key] = time() + 180;
        } else {
            $this->code = $_SESSION['csrf_code'];
        }

        session_write_close();
        return $this;
    }

    private function generate()
    {
        $this->token = bin2hex(random_bytes($this->length));
    }

    private function generateCode()
    {
        $this->code = bin2hex(random_bytes(4));
    }

    public static function validateToken($csrf_token)
    {
        session_start();
        $token_exp = isset($_SESSION['csrf_token']) ? $_SESSION[self::$token_exp_key] : 0;

        if (empty($csrf_token) || empty($token_exp) || $token_exp < time()) {
            session_write_close();
            return false;
        }

        if ($csrf_token !== $_SESSION['csrf_token']) {
            session_write_close();
            return false;
        }

        session_write_close();
        return true;
    }

    public static function validateCode($csrf_code)
    {
        session_start();
        $code_exp = isset($_SESSION['csrf_code']) ? $_SESSION[self::$code_exp_key] : 0;

        if (empty($csrf_code) || empty($code_exp) || $code_exp < time()) {
            session_write_close();
            return false;
        }

        if ($csrf_code !== $_SESSION['csrf_code']) {
            session_write_close();
            return false;
        }

        session_write_close();
        return true;
    }


    public function getToken()
    {
        return $this->token;
    }

    public function getCode()
    {
        return $this->code;
    }

    public static function unsetToken()
    {
        session_start();
        unset($_SESSION['csrf_token']);
        unset($_SESSION['csrf_token_exp']);
        unset($_SESSION['token']);
        unset($_SESSION['emailpw']);
        session_write_close();
    }
    public static function unsetCode()
    {
        session_start();
        unset($_SESSION['verification_code']);
        unset($_SESSION['verification_code_exp']);
        unset($_SESSION['code']);
        session_write_close();
    }
}
