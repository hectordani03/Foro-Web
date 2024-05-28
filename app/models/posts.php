<?php

namespace app\models;

class posts extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'userId',
            'text',
            'category',
            'hashtag',
            'postId',
            'img'
        ];
    }

    public function addPosts($data)
    {
        if ((isset($data['text']) || isset($data['hashtags']) || isset($_FILES['img'])) && !empty($data['category']) && !empty($data['userId'])) {
            if (isset($_FILES["img"]) && $_FILES["img"]['name'] != "" && $_FILES["img"]['size'] > 0 && $_FILES["img"] != "") {
                $data['img'] = getPostImg("img");
                if ($data['img'] === false) {
                    return false;
                }
            } else {
                $data['img'] = "";
            }
            $this->values = [
                $data['userId'],
                $data["text"],
                $data["category"],
                $data["hashtags"],
                NULL,
                $data['img']
            ];
            return $this->insert();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }

    public function sharePost($data)
    {
        if (!empty($data['category']) && !empty($data['userId']) && !empty($data['postId'])) {
            $this->values = [
                $data['userId'],
                $data["text"],
                $data["category"],
                NULL,
                $data['postId'],
                NULL
            ];
            return $this->insert();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }

    public function deletePost($data)
    {
        if (!empty($data['postId'])) {
            $this->where([['id', $data['postId']]]);
            deletePostimg($data['img']);
            return $this->delete();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }

    public function getAllPosts($userId)
    {
        $result = $this->select([
            'a.*',
            'b.username',
            'c.profilePic',
            'd.text as originalText',
            'd.img as originalImg',
            'd.hashtag as originalhtsg',
            'd.created_at as originalCreatedAt',
            'e.username as originalUsername',
            'f.profilePic as originalProfilePic',
            '(SELECT COUNT(*) FROM interactions i JOIN interposts ip ON i.id = ip.interId WHERE i.type = "like" AND ip.postId = a.id) as likes',
            '(SELECT COUNT(*) FROM comments h WHERE h.postId = a.id) as comments',
            '(SELECT COUNT(*) FROM posts t WHERE t.postId = a.id) as shares',
            '(SELECT COUNT(*) FROM interactions i JOIN interposts ip ON i.id = ip.interId WHERE ip.postId = a.id AND i.type = "like" AND i.userId = ' . $userId . ') as userLiked'


        ])
            ->join('user b', 'a.userId = b.id')
            ->join('userinfo c', 'b.id = c.userId')
            ->join('posts d', 'a.postId = d.id', 'LEFT')
            ->join('user e', 'd.userId = e.id', 'LEFT')
            ->join('userinfo f', 'e.id = f.userId', 'LEFT')
            ->orderBy([['a.created_at', 'DESC']])
            ->get();

        return $result;
    }

    public function getUserPosts($userId)
    {
        $result = $this->select([
            'a.id, a.text, a.img, a.hashtag, a.userId, a.category, a.created_at, b.username, c.profilePic',
            '(SELECT COUNT(*) FROM interactions i JOIN interposts ip ON i.id = ip.interId WHERE i.type = "like" AND ip.postId = a.id) as likes',
            '(SELECT COUNT(*) FROM comments h WHERE h.postId = a.id) as comments',
            '(SELECT COUNT(*) FROM posts t WHERE t.postId = a.id) as shares'
        ])
            ->join('user b', 'a.userId=b.id')
            ->join('userinfo c', 'b.id=c.userId')
            ->where([
                ['a.userId', $userId],
                ['a.postId', 'NULL', 'IS']
            ])
            ->orderBy([['a.created_at', 'DESC']])
            ->get();
        return $result;
    }

    public function getPostsByCategory($category)
    {
        $result = $this->select([
            'a.*',
            'b.username',
            'c.profilePic',
            'd.text as originalText',
            'd.img as originalImg',
            'd.hashtag as originalhtsg',
            'd.created_at as originalCreatedAt',
            'e.username as originalUsername',
            'f.profilePic as originalProfilePic',
            '(SELECT COUNT(*) FROM interactions i JOIN interposts ip ON i.id = ip.interId WHERE i.type = "like" AND ip.postId = a.id) as likes',
            '(SELECT COUNT(*) FROM comments h WHERE h.postId = a.id) as comments',
            '(SELECT COUNT(*) FROM posts t WHERE t.postId = a.id) as shares'
        ])
            ->join('user b', 'a.userId = b.id')
            ->join('userinfo c', 'b.id = c.userId')
            ->join('posts d', 'a.postId = d.id', 'LEFT')
            ->join('user e', 'd.userId = e.id', 'LEFT')
            ->join('userinfo f', 'e.id = f.userId', 'LEFT')
            ->where([['a.category', $category]])
            ->orderBy([['a.created_at', 'DESC']])
            ->get();
        return $result;
    }

    public function getMostPopularPosts()
    {
        $fields = [
            'a.*',
            'b.username',
            'c.profilePic',
            'd.text as originalText',
            'd.img as originalImg',
            'd.hashtag as originalhtsg',
            'd.created_at as originalCreatedAt',
            'e.username as originalUsername',
            'f.profilePic as originalProfilePic',
            '(SELECT COUNT(*) FROM interactions i JOIN interposts ip ON i.id = ip.interId WHERE i.type = "like" AND ip.postId = a.id) as likes',
            '(SELECT COUNT(*) FROM comments h WHERE h.postId = a.id) as comments',
            '(SELECT COUNT(*) FROM posts t WHERE t.postId = a.id) as shares'
        ];
        $result = $this->select($fields)
            ->join('user b', 'a.userId = b.id')
            ->join('userinfo c', 'b.id = c.userId')
            ->join('posts d', 'a.postId = d.id', 'LEFT')
            ->join('user e', 'd.userId = e.id', 'LEFT')
            ->join('userinfo f', 'e.id = f.userId', 'LEFT')
            ->where([
                ['(SELECT COUNT(*) FROM interactions i JOIN interposts ip ON i.id = ip.interId WHERE i.type = "like" AND ip.postId = a.id)', 5, '>']
            ])
            ->orderBy([['a.created_at', 'DESC']])
            ->get();

        return $result;
    
    }


    public function getUserSharedPosts($userId)
    {
        $result = $this->select([
            'a.*',
            'b.username',
            'c.profilePic',
            'd.text as originalText',
            'd.img as originalImg',
            'd.hashtag as originalhtsg',
            'd.created_at as originalCreatedAt',
            'e.username as originalUsername',
            'f.profilePic as originalProfilePic',
            '(SELECT COUNT(*) FROM interactions i JOIN interposts ip ON i.id = ip.interId WHERE i.type = "like" AND ip.postId = a.id) as likes',
            '(SELECT COUNT(*) FROM comments h WHERE h.postId = a.id) as comments',
            '(SELECT COUNT(*) FROM posts t WHERE t.postId = a.id) as shares'
        ])
            ->join('user b', 'a.userId = b.id')
            ->join('userinfo c', 'b.id = c.userId')
            ->join('posts d', 'a.postId = d.id', 'LEFT')
            ->join('user e', 'd.userId = e.id', 'LEFT')
            ->join('userinfo f', 'e.id = f.userId', 'LEFT')
            ->where([
                ['b.id', $userId],
                ['a.postId', NULL, '<>']
            ])
            ->orderBy([['a.created_at', 'DESC']])
            ->get();

        return $result;
    }

    public function getTotalPostsUntil($date)
    {
        $result = $this->select(['id'])
            ->count('id')
            ->where([['created_at', $date, '<=']])
            ->get();
        return $result;
    }

    public function getNewPosts($date)
    {
        $result = $this->select(['id'])
            ->count('id')
            ->where([['created_at', $date, '>']])
            ->get();
        return $result;
    }

    public function getMostQuantityPosts()
    {
        $result = $this->select(['a.category, b.img'])
            ->count('a.id')
            ->join('categories b', 'a.category=b.name')
            ->groupBy([['a.category']])
            ->orderBy([['tt', 'DESC']])
            ->limit(5)
            ->get();
        return $result;
    }

    public function getLikes()
    {
        $result = $this
            ->select(['a.id'])
            ->count('a.id')
            ->join('interposts b', 'a.id = b.postId', 'LEFT')
            ->join('interactions c', 'b.interId = c.id')
            ->where([['c.type', 'like']])
            ->get();
        return $result;
    }
}
