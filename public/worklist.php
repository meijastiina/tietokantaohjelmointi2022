<?php
include TEMPLATES_DIR."head.php";
include MODULES_DIR."worktime.php";

// Get all worktime from database
$worktimelist = getWorktimeReport();
?>
<table class="table table-striped">
    <tr>
        <th>Start time</th>
        <th>End time</th>
    </tr>
<?php
foreach($worktimelist as $worktime){
    echo "<tr><td>".$worktime["start_time"]."</td><td>".$worktime["end_time"].'</td></tr>';
}
?>

</table>;
<?php
include TEMPLATES_DIR.'foot.php';
?>