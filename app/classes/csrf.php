<?php

namespace app\classes;

class csrf
{
    private $length = 32;
    private $token;
    private $token_exp;
    private $time_exp = 60 * 10;


    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['csrf_token'])) {
            $this->generate();
            $_SESSION['csrf_token'] = [
                'token' => $this->token,
                'exp' => $this->token_exp
            ];
            session_write_close();
            return $this;
        }
        
        $this->token = $_SESSION['csrf_token']['token'];
        $this->token_exp = $_SESSION['csrf_token']['exp'];
        session_write_close();
        return $this;
    }

    private function generate()
    {
        $this->token = bin2hex(random_bytes($this->length));
        $this->token_exp = time() + $this->time_exp;
    }
    
    public static function validate($csrf_token, $validate_exp = false)
    {
        $self = new self;
        if ($validate_exp && $self->getExpiration() < time()) {
            return false;
        }
        if ($csrf_token !== $self->get_token()) {
            return false;
        }
    }

    public function get_token()
    {
        return $this->token;
    }

    private function getExpiration()
    {
        return $this->token_exp;
    }
}
