<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset= "UTF-8">
        <meta name = "viewport" content="width=length-width, initial-scale=">
        <title>Calc</title>
</head>
<body>
    <form><h1>Enter numbers</h1>
    <input num="num1" value=""><br>
    <input num="num2" value=""><br>
    <input type="submit" name="sub" value="+">
    <input type="submit" name="sub" value="-">
    <input type="submit" name="sub" value="*">
    <input type="submit" name="sub" value="/"><br>
    <br>Result: <input type='text' value='<? echo $ans; ?>'><br>
</form>

    <?php
    if(isset($_POST['sub'])){
        $num1=$_POST['n1'];
        $num2=$_POST['n2'];
        $oprnd=$_POST['sub'];
        if($oprnd=="+")
            $ans=$num1+$num2;
        else if($oprd=="-")
            $ans=$num1-$num2;
        else if($oprd=="*")
            $ans=$num1*$num2;
        else if($oprnd=="/")
            $ans=$num1/$num2;
        
    }
    ?>

</body>
</html>