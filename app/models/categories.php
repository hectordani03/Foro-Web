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
            'description',
            'hashtag',
            'img',
            'gif',
            'banner'
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

    public function getTotalCategoriesUntil($date)
    {
        $result = $this->select(['id'])
            ->count('id')
            ->where([['created_at', $date, '<=']])
            ->get();
        return $result;
    }

    public function getNewCategories($date)
    {
        $result = $this->select(['id'])
            ->count('id')
            ->where([['created_at', $date, '>']])
            ->get();
        return $result;
    }

    public function addCategory($data)
    {
        $fileStatus = true;
        $files = ['img', 'gif', 'banner'];
        foreach ($files as $file) {
            if (!checkFiles($file)) {
                $fileStatus = false;
                break;
            }
        }
        if (!empty($data['name']) && !empty($data['description']) && !empty($data['hashtags']) && $fileStatus !== false) {
            $data['img'] = getCategoryImg("img");
            $data['gif'] = getCategoryImg("gif");
            $data['banner'] = getCategoryImg("banner");
            if ($data['img'] === false || $data['gif'] === false || $data['banner'] === false) {
                return false;
            }

            $this->values = [
                $data['name'],
                $data["description"],
                $data["hashtag"],
                $data["img"],
                $data["gif"],
                $data["banner"]
            ];
            return $this->insert();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }
    
    public function deleteCategory($data)
    {
        $fileStatus = true;
        $files = ['img', 'gif', 'banner'];
        foreach ($files as $file) {
            if (!checkFiles($file)) {
                $fileStatus = false;
                break;
            }
        }
        if (!empty($data['categoryId']) && $fileStatus !== false) {
            $this->where([['id', $data['categoryId']]]);
            deletecategorytimg('img');
            deletecategorytimg('gif');
            deletecategorytimg('banner');
            return $this->delete();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }
}
