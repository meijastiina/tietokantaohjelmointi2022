<?php
include('../src/templates/head.php');
    echo '<form action="../src/modules/login.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" class="btn btn-primary" value="Log in">
    </form>';
include('../src/templates/foot.php');