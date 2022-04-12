<?php
include TEMPLATES_DIR."head.php";
include MODULES_DIR."worktime.php";

// Get all worktimes from database
$workTimes = getWorktimeReport();
// Get monthly totals from database
$monthlyTotals = getMonthlyTotals();
?>
<h2>All Worktimes</h2>
<table class="table table-striped">
    <tr>
        <th>Lastname</th>
        <th>First name</th>
        <th>Start time</th>
        <th>End time</th>
        <th>Duration</th>
    </tr>
<?php
foreach($workTimes as $workTime){
    echo "<tr><td>".$workTime["lastname"]."</td><td>" . $workTime["firstname"]."</td><td>" . $workTime["start_time_formatted"]."</td><td>".$workTime["end_time_formatted"].'</td><td>' . $workTime["duration"] . '</tr>';
}
?>

</table>
<h2>Monthly Totals</h2>
<table class="table table-striped">
    <tr>
        <th>Month</th>
        <th>Total Hours</th>
    </tr>
    <?php
        foreach($monthlyTotals as $month){
            echo "<tr><td>".$month["month"]."</td><td>" . $month["MonthlyTotalHours"]."</td></tr>";
        }
    ?>
</table>
<?php
include TEMPLATES_DIR.'foot.php';
?>