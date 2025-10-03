<!DOCTYPE html>
<html>
<head>
    <title>PHP Loops & Conditionals Demo - Pass/Fail Tables</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { background: #eee; padding: 10px; clear: both; }
        table { border-collapse: collapse; width: 45%; margin: 15px; float: left; }
        th, td { border: 1px solid #444; padding: 8px; text-align: center; }
    </style>
</head>
<body>

<?php
$students = [
    ["name" => "Alice", "marks" => 85],
    ["name" => "Bob", "marks" => 40],
    ["name" => "Charlie", "marks" => 72],
    ["name" => "Diana", "marks" => 55],
    ["name" => "Ethan", "marks" => 30]
];
?>

<!-- FOREACH + IF ELSEIF ELSE -->
<h2>Foreach + if...elseif...else</h2>
<?php
$pass = $fail = [];
foreach ($students as $student) {
    if ($student['marks'] >= 50) $pass[] = $student;
    else $fail[] = $student;
}
?>

<!-- Pass Table -->
<table class="pass">
<tr><th colspan="3">Pass Students</th></tr>
<tr><th>Name</th><th>Marks</th><th>Grade</th></tr>
<?php
foreach ($pass as $student) {
    $marks = $student['marks'];
    if ($marks >= 90) $grade = "A";
    elseif ($marks >= 75) $grade = "B";
    else $grade = "C";
    echo "<tr><td>{$student['name']}</td><td>$marks</td><td>$grade</td></tr>";
}
?>
</table>

<!-- Fail Table -->
<table class="fail">
<tr><th colspan="3">Fail Students</th></tr>
<tr><th>Name</th><th>Marks</th><th>Grade</th></tr>
<?php
foreach ($fail as $student) {
    echo "<tr><td>{$student['name']}</td><td>{$student['marks']}</td><td>F</td></tr>";
}
?>
</table>

<hr style="clear: both;">

<!-- FOR LOOP + TERNARY -->
<h2>For loop + ternary</h2>
<?php
$pass = $fail = [];
for ($i = 0; $i < count($students); $i++) {
    if ($students[$i]['marks'] >= 50) $pass[] = $students[$i];
    else $fail[] = $students[$i];
}
?>

<!-- Pass Table -->
<table class="pass">
<tr><th colspan="2">Pass Students</th></tr>
<tr><th>Name</th><th>Marks</th></tr>
<?php
for ($i = 0; $i < count($pass); $i++) {
    echo "<tr><td>{$pass[$i]['name']}</td><td>{$pass[$i]['marks']}</td></tr>";
}
?>
</table>

<!-- Fail Table -->
<table class="fail">
<tr><th colspan="2">Fail Students</th></tr>
<tr><th>Name</th><th>Marks</th></tr>
<?php
for ($i = 0; $i < count($fail); $i++) {
    echo "<tr><td>{$fail[$i]['name']}</td><td>{$fail[$i]['marks']}</td></tr>";
}
?>
</table>

<hr style="clear: both;">

<!-- WHILE LOOP + SWITCH -->
<h2>While loop + switch</h2>
<?php
$pass = $fail = [];
$i = 0;
while ($i < count($students)) {
    if ($students[$i]['marks'] >= 50) $pass[] = $students[$i];
    else $fail[] = $students[$i];
    $i++;
}
?>

<!-- Pass Table -->
<table class="pass">
<tr><th colspan="3">Pass Students</th></tr>
<tr><th>Name</th><th>Marks</th><th>Grade</th></tr>
<?php
$i = 0;
while ($i < count($pass)) {
    $marks = $pass[$i]['marks'];
    switch (true) {
        case ($marks >= 90): $grade = "A"; break;
        case ($marks >= 75): $grade = "B"; break;
        default: $grade = "C";
    }
    echo "<tr><td>{$pass[$i]['name']}</td><td>$marks</td><td>$grade</td></tr>";
    $i++;
}
?>
</table>

<!-- Fail Table -->
<table class="fail">
<tr><th colspan="3">Fail Students</th></tr>
<tr><th>Name</th><th>Marks</th><th>Grade</th></tr>
<?php
$i = 0;
while ($i < count($fail)) {
    echo "<tr><td>{$fail[$i]['name']}</td><td>{$fail[$i]['marks']}</td><td>F</td></tr>";
    $i++;
}
?>
</table>

<hr style="clear: both;">

<!-- DO...WHILE + IF -->
<h2>Do...while loop + simple if</h2>
<?php
$pass = $fail = [];
$j = 0;
do {
    if ($students[$j]['marks'] >= 50) $pass[] = $students[$j];
    else $fail[] = $students[$j];
    $j++;
} while ($j < count($students));
?>

<!-- Pass Table -->
<table class="pass">
<tr><th colspan="3">Pass Students</th></tr>
<tr><th>Name</th><th>Marks</th><th>Remark</th></tr>
<?php
$j = 0;
do {
    $marks = $pass[$j]['marks'];
    if ($marks >= 75) $remark = "Good Performance";
    else $remark = "Average";
    echo "<tr><td>{$pass[$j]['name']}</td><td>$marks</td><td>$remark</td></tr>";
    $j++;
} while ($j < count($pass));
?>
</table>

<!-- Fail Table -->
<table class="fail">
<tr><th colspan="3">Fail Students</th></tr>
<tr><th>Name</th><th>Marks</th><th>Remark</th></tr>
<?php
$j = 0;
do {
    $marks = $fail[$j]['marks'];
    $remark = "Needs Improvement";
    echo "<tr><td>{$fail[$j]['name']}</td><td>$marks</td><td>$remark</td></tr>";
    $j++;
} while ($j < count($fail));
?>
</table>

</body>
</html>
