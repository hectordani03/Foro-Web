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
        $result = $this->select(['name, gif'])
            ->get();
        return $result;
    }

    public function getAllHashtags($category)
    {
        $result = $this->select(['hashtag'])
        ->where([['name', $category]])
            ->get();
        return $result;
    }
}