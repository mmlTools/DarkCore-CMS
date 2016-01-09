<?php
class BoardData{
    public $categorys = array();
    function get_all_categorys(){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT `id`,`title` FROM ".$DB_WEBSITE.".`forum_category`";
        $i=1;
        if ($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($_id,$_title);
            while($stmt->fetch()){
                $this->categorys[$i] = array(
                    'id' => $_id,
                    'title' => $_title);
                $i++;
            }
            $stmt->close();
        }
        $con->close();
    }
    function construct(){
        $this->get_all_categorys();
    }
}
class ForumsData{
    public $forums = array();
    function get_forums_by_category($_cat_id){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT `id`,`title`,`description`,`icon` FROM ".$DB_WEBSITE.".`forum_forums` WHERE `category`=?";
        $i=1;
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param('i',$_cat_id);
            $stmt->execute();
            $stmt->bind_result($_id,$_title,$_description,$_icon);
            while($stmt->fetch()){
                $this->forums[$i] = array(
                    'id' => $_id,
                    'title' => $_title,
                    'description' => $_description,
                    'icon' => $_icon);
                $i++;
            }
            $stmt->close();
        }
        $con->close();
    }

    function construct($_cat_id){
        $this->get_forums_by_category($_cat_id);
    }
}

class TopicsData{
    public $topics = array();
    public $last_topic = array();
    public $last_topic_index = array();
    public $total_posts = 0;
    public $total_topics = 0;
    public $latest_topics_index = array();

    function get_last_topic($_forum_id){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT `id`,`forum`,`title`,`body`,`autor`,`thumbnail`,`date` FROM ".$DB_WEBSITE.".`forum_topics` WHERE `forum`=? ORDER BY `id` DESC LIMIT 1";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param('i',$_forum_id);
            $stmt->execute();
            $stmt->bind_result($_id,$_forum,$_title,$_body,$_autor,$_thumbnail,$_date);
            while($stmt->fetch()){
                $this->last_topic = array(
                    'id' => $_id,
                    'forum' => $_forum,
                    'title' => $_title,
                    'body' => $_body,
                    'autor' => $_autor,
                    'thumbnail' => $_thumbnail,
                    'date' => $_date);
            }
            $stmt->close();
        }
        return $this->last_topic;
        $con->close();
    }
    function get_last_topic_index(){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT `id`,`forum`,`title`,`body`,`autor`,`thumbnail`,`date` FROM ".$DB_WEBSITE.".`forum_topics` ORDER BY `id` DESC LIMIT 1";
        if ($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($_id,$_forum,$_title,$_body,$_autor,$_thumbnail,$_date);
            while($stmt->fetch()){
                $this->last_topic_index = array(
                    'id' => $_id,
                    'forum' => $_forum,
                    'title' => $_title,
                    'body' => $_body,
                    'autor' => $_autor,
                    'thumbnail' => $_thumbnail,
                    'date' => $_date);
            }
            $stmt->close();
        }
        $con->close();
    }

    function total_posts_by_forum($_forum_id){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT * FROM ".$DB_WEBSITE.".`topic_comments` WHERE `forum_id`=?";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param('i',$_forum_id);
            $stmt->execute();
            $stmt->store_result();
            $this->total_posts = $stmt->num_rows();
            $stmt->close();
        }
        $con->close();
    }
    function get_latest_topics_index(){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT `id`,`forum`,`title`,`body`,`autor`,`thumbnail`,`date` FROM ".$DB_WEBSITE.".`forum_topics` ORDER BY `id` DESC LIMIT 5";
        $i=1;
        if ($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($_id,$_forum,$_title,$_body,$_autor,$_thumbnail,$_date);
            while($stmt->fetch()){
                $this->latest_topics_index[$i] = array(
                    'id' => $_id,
                    'forum' => $_forum,
                    'title' => $_title,
                    'body' => $_body,
                    'autor' => $_autor,
                    'thumbnail' => $_thumbnail,
                    'date' => $_date);
                $i++;
            }
            $stmt->close();
        }
        $con->close();
    }
    function total_topics_by_forum($_forum_id){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT * FROM ".$DB_WEBSITE.".`forum_topics` WHERE `forum`=?";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param('i',$_forum_id);
            $stmt->execute();
            $stmt->store_result();
            $this->total_topics = $stmt->num_rows();
            $stmt->close();
        }
        $con->close();
    }
    function construct($_forum_id){
        $this->get_topics_by_forum($_forum_id);
        $this->total_posts_by_forum($_forum_id);
        $this->total_topics_by_forum($_forum_id);
    }
    function construct_basic($_forum_id){
        $this->total_posts_by_forum($_forum_id);
        $this->total_topics_by_forum($_forum_id);
    }
    function construct_index(){
        $this->get_last_topic_index();
        $this->get_latest_topics_index();
    }
}

class ForumStats{
    public $total_accounts=0;
    public $total_posts=0;
    public $total_topics=0;
    public $last_member=0;
    public $latest_topics= array();
    public $latest_posts= array();
    public $latest_posts_forum = array();
    function get_total_accounts(){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT * FROM ".$DB_AUTH.".`account`";
        if ($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $stmt->store_result();
            $this->total_accounts = $stmt->num_rows();
            $stmt->close();
        }
        $con->close();
    }
    function get_total_posts(){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT * FROM ".$DB_WEBSITE.".`topic_comments`";
        if ($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $stmt->store_result();
            $this->total_posts = $stmt->num_rows();
            $stmt->close();
        }
        $con->close();
    }
    function get_total_topics(){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT * FROM ".$DB_WEBSITE.".`forum_topics`";
        if ($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $stmt->store_result();
            $this->total_topics = $stmt->num_rows();
            $stmt->close();
        }
        $con->close();
    }
    function get_last_member(){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_AUTH;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT `id`,`username` FROM ".$DB_AUTH.".`account` ORDER BY `id` asc LIMIT 1";
        if ($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($_id,$_username);
            $stmt->store_result();
            while($stmt->fetch()){
                $this->last_member = array(
                    'id' => $_id,
                    'username' => $_username);
            }
            $stmt->close();
        }
        $con->close();
    }
    function get_latest_topics(){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT `id`,`forum`,`title`,`body`,`autor`,`thumbnail`,`date` FROM ".$DB_WEBSITE.".`forum_topics` ORDER BY `id` DESC LIMIT 5";
        $i=1;
        if ($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($_id,$_forum,$_title,$_body,$_autor,$_thumbnail,$_date);
            while($stmt->fetch()){
                $this->latest_topics[$i] = array(
                    'id' => $_id,
                    'forum' => $_forum,
                    'title' => $_title,
                    'body' => $_body,
                    'autor' => $_autor,
                    'thumbnail' => $_thumbnail,
                    'date' => $_date);
                $i++;
            }
            $stmt->close();
        }
        $con->close();
    }
    function get_latest_posts(){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT `id`,`topic_id`,`forum_id`,`autor`,`body`,`date` FROM ".$DB_WEBSITE.".`topic_comments` ORDER BY `id` DESC LIMIT 5";
        $i=1;
        if ($stmt = $con->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($_id,$_topic_id,$_forum_id,$_autor,$_body,$_date);
            while($stmt->fetch()){
                $this->latest_posts[$i] = array(
                    'id' => $_id,
                    'topic_id' => $_topic_id,
                    'forum_id' => $_forum_id,
                    'autor' => $_autor,
                    'body' => $_body,
                    'date' => $_date);
                $i++;
            }
            $stmt->close();
        }
        $con->close();
    }
    function get_topic_by_id($_topic_id){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT `id`,`forum`,`title`,`body`,`autor`,`thumbnail`,`date` FROM ".$DB_WEBSITE.".`forum_topics` WHERE `id`=?";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param('i',$_topic_id);
            $stmt->execute();
            $stmt->bind_result($_id,$_forum,$_title,$_body,$_autor,$_thumbnail,$_date);
            while($stmt->fetch()){
                $this->latest_posts_forum = array(
                    'id' => $_id,
                    'forum' => $_forum,
                    'title' => $_title,
                    'body' => $_body,
                    'autor' => $_autor,
                    'thumbnail' => $_thumbnail,
                    'date' => $_date);
            }
            $stmt->close();
            return $this->latest_posts_forum;
        }
        $con->close();
    }
    function construct(){
        $this->get_last_member();
        $this->get_latest_posts();
        $this->get_total_accounts();
        $this->get_latest_topics();
        $this->get_total_topics();
        $this->get_total_posts();
    }
}

class TopicData{
    public $topic=array();
    public $comments=array();

    function check_topic_exist($id){
            global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
            $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
            $sql = "SELECT * FROM ".$DB_WEBSITE.".`forum_topics` WHERE `id`=?";
            if ($stmt = $con->prepare($sql)) {
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows() > 0)
                    return true;
                else
                    return false;
                $stmt->close();
            }
        return false;
        $con->close();
    }

    function get_topics_by_id($topic_id){
        global $DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_WEBSITE;
        $con = connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);
        $sql = "SELECT `id`,`forum`,`title`,`body`,`autor`,`thumbnail`,`date` FROM ".$DB_WEBSITE.".`forum_topics` WHERE `id`=?";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param('i',$topic_id);
            $stmt->execute();
            $stmt->bind_result($_id,$_forum,$_title,$_body,$_autor,$_thumbnail,$_date);
            while($stmt->fetch()){
                $this->topic = array(
                    'id' => $_id,
                    'forum' => $_forum,
                    'title' => $_title,
                    'body' => $_body,
                    'autor' => $_autor,
                    'thumbnail' => $_thumbnail,
                    'date' => $_date);
            }
            $stmt->close();
        }
        $con->close();
    }
}