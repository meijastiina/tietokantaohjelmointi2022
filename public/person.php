<?php
include('../src/templates/head.php');
    echo '<form action="add_person.php" method="post">
        <label for="fname">First name:</label><br>
        <input type="text" name="fname" id="fname"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" name="lname" id="lname"><br>
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" class="btn btn-primary" value="Add person">
    </form>';
include('../src/templates/foot.php');