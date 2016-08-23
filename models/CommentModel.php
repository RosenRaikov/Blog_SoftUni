<?php
class CommentModel extends BaseModel {

    /**
     * This methos is used to save a comment
     * @param string $comment
     * @param int $post_id
     * @return int | Returns the comment id on succsess
     */
    public function save($comment, $post_id, $user_id) {

        $post_id = (int) $post_id;

        $comment = strip_tags($comment, '<a><p>');
        $comment = self::$db->escape_string($comment);
        $author = $user_id;
        $sql = "INSERT INTO comments (comment, post_id) VALUES ('{$comment}', '{$post_id}')";
        self::$db->query($sql);

        return self::$db->insert_id;
    }

}