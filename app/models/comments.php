<?php

namespace app\models;

class comments extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();

    }

}
