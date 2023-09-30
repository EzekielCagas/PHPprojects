<!DOCTYPE html>
<html lang = en>
    <head>
        <meta charset = "UTF-8">
        <title>PHP Constant and Operator</title>
</head>
<body>
    <h3>Constants</h3>
    <?php
        define("MINISIZE", 50);

        echo MINISIZE;
        echo constant("MINISIZE");

        // Valid constant names
    define("ONE", "first thing");
    define("TWO2", "second thing");
    define("THREE_3", "third thing")
    // Invalid constant names
    //define("2TWO", "second thing");
    //define("__THREE__", "third value"); 
    ?>
    <h3>Operator Types</h3>
    <?php
        $a = 42;
        $b = 20;
        
        $c = $a + $b;
        echo "Addition Operation Result: $c <br/>";
        $c = $a - $b;
        echo "Subtraction Operation Result: $c <br/>";
        $c = $a * $b;
        echo "Multiplication Operation Result: $c <br/>";
        $c = $a / $b;
        echo "Division Operation Result: $c <br/>";
        $c = $a % $b;
        echo "Modulus Operation Result: $c <br/>";
        $c = $a++;
        echo "Increment Operation Result: $c <br/>";
        $c = $a--;
        echo "Decrement Operation Result: $c <br/>";
    ?>
</body>
</html>