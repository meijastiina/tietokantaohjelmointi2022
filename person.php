<?php
include('head.php');
    echo '<form action="add_person.php" method="post">
        <label for="fname">First name:</label><br>
        <input type="text" name="fname" id="fname"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" name="lname" id="lname"><br>
        <input type="submit" class="btn btn-primary" value="Add person">
    </form>';
include('foot.php');