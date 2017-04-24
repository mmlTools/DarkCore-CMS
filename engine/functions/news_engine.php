<?php if (!defined("DARKCORECMS")) header('Location: ../../');
class News{
    public $news = array(), $news_errors = array();
    function __construct(){
        $this->get_news();
    }
    private function get_news(){
        global $database;
        $con = connect($database['web_db']);
        $sql = "SELECT * FROM `news` ORDER BY `date` DESC LIMIT 10";
        if ($stmt = $con->prepare($sql)){
            $stmt->execute();
            $result = $stmt->get_result();
            while($data = $result->fetch_assoc()){
                array_push($this->news, array(
                    "id" => $data['id'],
                    "title" => $data['title'],
                    "body" => $data['body'],
                    "author" => $this->get_author_info($data['author']),
                    "date" => $data['date'],
                    "comments" => $this->get_news_comments($data['id'])
                ));
            }
        }
    }
    private function get_news_comments($news_id){
        global $database;
        $con = connect($database['web_db']);
        $sql = "SELECT * FROM `news_reply` WHERE `news_id` = ? ORDER BY `date` DESC";
        $comments = array();
        if ($stmt = $con->prepare($sql)){
            $stmt->bind_param("i", $news_id);
            $stmt->execute();
            $result = $stmt->get_result();
            while($data = $result->fetch_assoc()){
                array_push($comments, array(
                    "id" => $data['id'],
                    "news_id" => $data['news_id'],
                    "author" => $this->get_author_info($data['author']),
                    "body" => $data['body'],
                    "date" => $data['date']
                ));
            }
            $stmt->close();
        }
        $con->close();
        return $comments;
    }
    private function get_author_info($id){
        global $database;
        $con = connect($database['auth_db']);
        $sql = "SELECT `id`, `username`, `email`, `joindate`, `last_login`, `vp`, `total_votes`, `dp`, `age`, `country`, `foundus`, `nickname`, `avatar`, `last_ip` FROM `account` WHERE `id` = ?";
        $info = array();
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($data = $result->fetch_assoc()) {
                $info = array(
                    "id" => $data['id'],
                    "username" => $data['username'],
                    "email" => $data['email'],
                    "joindate" => $data['joindate'],
                    "last_login" => $data['last_login'],
                    "vp" => $data['vp'],
                    "total_votes" => $data['total_votes'],
                    "dp" => $data['dp'],
                    "age" => $data['age'],
                    "country" => $data['country'],
                    "foundus" => $data['foundus'],
                    "nickname" => $data['nickname'],
                    "avatar" => $data['avatar'],
                    "last_ip" => $data['last_ip'],
                    "rank" => get_rank($data['id'])
                );
            }
            $stmt->close();
        }
        $con->close();
        return $info;
    }
    function get_newsById($id){
        global $database;
        $con = connect($database['web_db']);
        $sql = "SELECT * FROM `news` WHERE `id` = ?";
        if ($stmt = $con->prepare($sql)){
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            while($data = $result->fetch_assoc()){
                array_push($this->news, array(
                    "id" => $data['id'],
                    "title" => $data['title'],
                    "body" => $data['body'],
                    "author" => $this->get_author_info($data['author']),
                    "date" => $data['date'],
                    "comments" => $this->get_news_comments($data['id'])
                ));
            }
        }
    }
}