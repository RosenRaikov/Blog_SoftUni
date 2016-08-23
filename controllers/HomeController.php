<?php

class HomeController extends BaseController
{
    function index() {
        $lastPosts = $this->model->getLastPosts(5);
        $this->posts = array_slice($lastPosts, 0, 3);
        $this->sidebarPosts = $lastPosts;
    }
	
	function view($id) {
        $this->post = $this->model->getPostById($id);
        $this->comments = $this->model->getCommentsByPostID($id);
    }

    public function create_comment($id) {
        $ref = $_SERVER['HTTP_REFERER'];

        if($_POST['comment'] && trim($_POST['comment']) !== '') {
            $comment = new CommentModel();
            $comment->save($_POST['comment'], $id);
        }

        $this->redirectToUrl($ref);
    }

    public function delete_comment($comment_id){
        $ref = $_SERVER['HTTP_REFERER'];
        if($_POST['comment'] && trim($_POST['comment']) !== '') {
            $comment = new CommentModel();
            $comment->deleteComment($_POST['comment'], $comment_id);
        }

        $this->redirectToUrl($ref);
    }

    public function comments($post_id)
    {
        $this->comment = $this->model->getCommentsByPostID($post_id);
    }
}