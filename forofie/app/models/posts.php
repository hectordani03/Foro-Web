<?php

namespace app\models;

class posts extends Model
{
    protected $table;
    protected $fillable = [
        'userId',
        'title',
        'body'
    ];
    public $values = [];

    public function getAllPosts()
    {
        $result = $this->all()->get();
        return $result;
    }
}
