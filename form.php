
<!DOCTYPE html>
<html>
<head>
    <title>Group Maker from 3 Arrays</title>
</head>
<body>

<h2>Enter Rolls or Names (Comma Separated)</h2>

<form method="post">
    <label>Array 1:</label><br>
    <input type="text" name="array1" placeholder="Input Rolls : " size="50"><br><br>

    <label>Array 2:</label><br>
    <input type="text" name="array2" placeholder="Input Rolls : " size="50"><br><br>

    <label>Array 3:</label><br>
    <input type="text" name="array3" placeholder="Input Rolls : " size="50"><br><br>

    <input type="submit" value="Make Groups">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize input
    $array1 = array_filter(array_map('trim', explode(',', $_POST['array1'])));
    $array2 = array_filter(array_map('trim', explode(',', $_POST['array2'])));
    $array3 = array_filter(array_map('trim', explode(',', $_POST['array3'])));

    echo "<h2>Generated Groups</h2>";
    shuffle($array1);
    shuffle($array2);
    shuffle($array3);

    // Create groups
    $groups = [];
    while (!empty($array1) && !empty($array2) && !empty($array3)) {
        $person1 = array_shift($array1);
        $person2 = array_shift($array2);
        $person3 = array_shift($array3);
        $groups[] = [$person1, $person2, $person3];
    }

    // Merge leftovers
    $remaining = array_merge($array1, $array2, $array3);
    if (!empty($remaining)) {
        $groups[] = $remaining;
    }

    // Display the groups
    foreach ($groups as $index => $group) {
        echo "<strong>Group " . ($index + 1) . ":</strong> " . implode(", ", $group) . "<br>";
    }
}
?>

</body>
</html>
