<?php

namespace app\models;

class categories extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'name',
            'img',
        ];
    }

    public function getAllCategories()
    {
        $result = $this->select(['name, img'])
            ->get();
        return $result;
    }

}