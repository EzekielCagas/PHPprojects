<!DOCTYPE html>
<html lang = en>
    <head>
        <meta charset = "UTF-8">
        <title>PHP Variable Types</title>
</head>
<body>
    <h3>PHP Integer</h3>
    <?php
        $int_var = 12345;
        $another_int = -12345 + 12345;

        echo $int_var;
        echo "<br>";
        echo $another_int;
    ?>
    <h3>PHP Doubles</h3>
    <?php
        $many = 2.2888800;
        $many_2 = 2.2111200;
        $few = $many + $many_2;

        print("$many + $many_2 = $few<br>");
    ?>
    <h3>Boolean</h3>
    <?php
        if (TRUE)
        print("This world shall know pain<br>");
        else
        print("This world shall suffer<br>");

        $true_num = 3 + 0.14159;
        $true_str = "Tried and Tested"
        //$true_array[49] = "An array element";
        //$false_array = array();
        //$false_null = NULL;
        //$false_num = 999 - 999;
        //$false_str = "";
        //my_var = null;
    ?>
    <h3>Strings</h3>
    <?php
        $string_1 = "This is a string in double quotes";
        $string_2 = "This is a somewhat longer, singly quoted string";
        $string_39 = "This string has thirty-nine characters";
        $string_0 = ""; // a string with zero characters

        $variable = "name";
        $literally = 'My $variable will not print!\\n';
        print($literally);
        $literally = "My $variable will print!\\n";
        print($literally);
    ?>

</body>
</html>