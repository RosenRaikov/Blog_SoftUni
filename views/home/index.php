<?php $this->title = 'Welcome to My Blog'; ?>

<h1 class="welcome"><?=htmlspecialchars($this->title)?></h1>

<aside>
    <link  rel="icon" href="<?=APP_ROOT?>/content/images/favicon.ico" />
    <a class="img" href="<?=APP_ROOT?>"><img src="<?=APP_ROOT?>/content/images/site-logo.png"></a>
    <hr>

    <?php if ($this->isLoggedIn) : ?>
        <ul>
            <li class="menu-elements"><a href="<?=APP_ROOT?>/" class="menu-link">Home</a></li>
            <li class="menu-elements"><a href="<?=APP_ROOT?>/posts" class="menu-link">Posts</a> </li>
            <li class="menu-elements"><a href="<?=APP_ROOT?>/posts/create" class="menu-link">Create Post</a> </li>
            <li class="menu-elements"><a href="<?=APP_ROOT?>/users" class="menu-link">Users</a> </li>
        </ul>
    <?php else: ?>
        <ul>
            <li class="menu-elements"><a href="<?=APP_ROOT?>/" class="menu-link">Home</a></li>
            <li class="menu-elements"><a href="<?=APP_ROOT?>/users/login" class="menu-link">Login</a> </li>
            <li class="menu-elements"><a href="<?=APP_ROOT?>/users/register" class="menu-link">Register</a> </li>
        </ul>
    <?php endif; ?>
    <hr>
    <h2 class="rp-title">Recent Posts</h2>
    <hr>
    <ul>
    <?php foreach($this->sidebarPosts as $post) : ?>
        <li class="recent-post">
        <a class="recent-post-link" href="<?=APP_ROOT?>/home/view/<?=$post['id']?>"><?=
            htmlentities($post['title'])?>
        </a>
        </li>
    <?php endforeach ?>
    </ul>
    <hr>
</aside>

<main class="main">
    <article>
        <?php   foreach($this->posts as $post) : ?>
            <div class="dot">&nbsp;</div>
            <h2 class="title"><?=htmlspecialchars($post['title'])?></h2>
            <div class="date"><i>Posted on </i>
                <?=(new DateTime($post['date']))->format('d-M-Y')?>
                <i>by</i> <?=htmlspecialchars($post['full_name'])?>
            </div>
            <p class="content"><?=$post['content']?></p>
        <?php endforeach ?>
    </article>
</main>
