<!DOCTYPE html>
<html>
<head>
<title>Lab Task-1</title>
</head>
<body>
    <?php
    $nameErr = $emailErr =  "";
    $name = $email = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<p><span class="error">* required field</span></p>
<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    <fieldset>
        <legend>REGISTRATION</legend>
        Name: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr;?></span><br><hr>
        E-mail: <input type="email" name="email">
        <span class="error">* <?php echo $emailErr;?></span><br><hr>
        Password:<input type="password" name="password"><br><hr>
        Your Image:<input type="file" id="myFile" name="filename"><br><hr>
        <input type="submit" name="submit" value="Submit">
    </fieldset>
</form>

<?php
extract($_REQUEST);
$file=fopen("Hello.txt", "a");

fwrite($file,"Name :");
fwrite($file, $name ."\n");
fwrite($file,"Email :");
fwrite($file, $email ."\n");
fwrite($file,"Password :");
fwrite($file, $password ."\n");
fclose($file);
?>

</body>
</html>
