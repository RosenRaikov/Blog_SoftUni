<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles.css" />
    
    <script src="<?=APP_ROOT?>/content/scripts/jquery-3.0.0.min.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/blog-scripts.js"></script>
    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
</head>

<body>
<header class="header">
    
    <a class="blog-title" href="<?=APP_ROOT?>/">Home</a>
    
    <?php if ($this->isLoggedIn) : ?>
        <div id="logged-in-info">
            <span class="hello-user">Hello, <b><?=htmlspecialchars($_SESSION['username'])?></b></span>
            <form method="post" action="<?=APP_ROOT?>/users/logout">
                <input type="submit" value="Logout"/>
            </form>
        </div>
    <?php endif; ?>
</header>


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
</aside>
