<?php $this->title = 'Login'; ?>

<h1 xmlns="http://www.w3.org/1999/html"><?= htmlspecialchars($this->title) ?></h1>

<form class="login" method="post">
    <div><label for = "username">Username:</label></div>
    <input id="username" type="text" name="username" />
    <div><label for="password">Password:</label></div>
    <input id="password" type="password" name="password" />
    <div><input type="submit" value="Login"/>
        <a href="<?=APP_ROOT?>/users/register/">[Go to Register]</a></div>
</form>