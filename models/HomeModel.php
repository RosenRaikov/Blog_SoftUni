<?php

class HomeModel extends BaseModel
{
    public function getLastPosts (int $maxCount = 5 ) : array
    {
        $statement = self::$db->query(
            "SELECT posts.id, title, content, date, full_name " .
            "FROM posts LEFT JOIN users ON posts.user_id = users.id " .
            "ORDER BY date DESC LIMIT $maxCount");
            return $statement->fetch_all(MYSQLI_ASSOC);

    }

    public function getPostById (int $id)
    {
        $statement = self::$db->prepare(
            "SELECT posts.id, title, content, date, full_name " .
            "FROM posts LEFT JOIN users ON posts.user_id = users.id " .
            "WHERE posts.id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        $statement->close();
        return $result;

    }

    public function getCommentById ($id = 1)
    {
       // $statement = self::$db->prepare(
         //   "SELECT * FROM comments " .
           // "WHERE comment_id = ?");

        $statement = self::$db->prepare('SELECT * FROM comments WHERE comment_id = ?');
        $statement->bind_param("i", $id);

        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        $statement->close();
        return $result;
    }

    public function getCommentsByPostID($post_id) {

        $sql = 'SELECT * FROM comments INNER JOIN posts ON posts.id = comments.post_id AND posts.id = ? ORDER BY comments.comment_id DESC';
        $statement = self::$db->prepare($sql);
        $statement->bind_param('i', $post_id);
        $statement->execute();
        $row = array();
        //$statement->bind_result($comment_id, $comment, $post_id);
        $data = array();

        $result = $statement->get_result();

        while($row = $result->fetch_array()) {
            $data[] = $row;
        }

        $statement->close();
        return $data;
    }
}
