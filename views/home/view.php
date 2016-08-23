<?php $this->title = $this->post['title']; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main id="posts">
    <article class="view-post">
        <div class="date"><i>Posted on</i>
            <?=(new DateTime($this->post['date']))->format('d-M-Y')?>
            <i>by</i> <?=htmlentities($this->post['full_name'])?>
        </div>
        <p class="content"><?=$this->post['content']?></p>
    </article>

    <article class="comments">
        <div class="comments-label">Comments:</div>

        <?php foreach ($this->comments as $comment):?>
            <p class="content comment">
                <?php echo $comment['comment'];?>
            </p>
            <div class="date"><i>Posted on</i>
                <?=(new DateTime($comment['date']))->format('d-M-Y')?>
                <i>by</i> <?=htmlentities($comment['author'])?>
            </div>
        <?php endforeach;?>


        <form method="post" action="<?=APP_ROOT?>/home/create_comment/<?php echo $this->post['id'];?>">

            <p>
                <label for="comment">
                    Comment:
                </label>
                <textarea name="comment" placeholder="Leave a comment" id="comment"></textarea>
            </p>
            <p>
                <button type="submit">
                    Submit
                </button>
            </p>

        </form>
    </article>
</main>
