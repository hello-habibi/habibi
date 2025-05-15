<!DOCTYPE html>
<html>
<head>
    <title>Group of 3 from Different Arrays</title>
</head>
<body>

<h2>Groups (One Member from Each Array)</h2>

<?php
// Step 1: Define three arrays
$array1 = ["Habib", "Rafiq"];
$array2 = ["Karim", "Sadia", "Amina"];
$array3 = ["Raju", "Nayeem", "Jannat", "Samira"];

// Step 2: Initialize groups
$groups = [];

// Step 3: Form groups of 1 member from each array
while (!empty($array1) && !empty($array2) && !empty($array3)) {
    $person1 = array_shift($array1);
    $person2 = array_shift($array2);
    $person3 = array_shift($array3);
    $groups[] = [$person1, $person2, $person3];
}

// Step 4: Collect remaining people
$remaining = array_merge($array1, $array2, $array3);

// Step 5: If remaining people exist, group them
if (!empty($remaining)) {
    $groups[] = $remaining;
}

// Step 6: Display the groups
foreach ($groups as $index => $group) {
    echo "<strong>Group " . ($index + 1) . ":</strong> ";
    echo implode(", ", $group);
    echo "<br>";
}
?>

</body>
</html> 

