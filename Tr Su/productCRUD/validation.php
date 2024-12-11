<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <?php
    $nameErr = "";
    $name = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = input_data($_POST["name"]);
            // check if name only contains letters and whitespace   
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {

                $nameErr = "Only alphabets and white space are allowed";
            }
        }
    }

    function input_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $emailErr = "";
    $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = input_data($_POST["email"]);

            // Check if the email format is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
    }

    $phoneErr = "";
    $phone = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["phone"])) {
            $phoneErr = "Phone number is required";
        } else {
            $phone = input_data($_POST["phone"]);

            // Check if the phone number matches the Myanmar phone number format
            if (!preg_match("/^(\+95|95)?(09\d{8}|01\d{7}|02\d{7}|03\d{7})$/", $phone)) {
                $phoneErr = "Invalid phone number format. Myanmar numbers must start with 09, 01, 02, or 03.";
            }
        }
    }


    ?>

    <h2>Registration Form</h2>
    <span class="error">* required field </span>
    <br><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Name:
        <input type="text" name="name">
        <span class="error">* <?php echo $nameErr; ?> </span>
        <br><br>

        <input type="text" name="email">
        <span class="error">* <?php echo $emailErr; ?> </span>
        <br><br>

        <input type="number" name="phone">
        <span class="error">* <?php echo $phoneErr; ?> </span>
        <br><br>

        <input type="text" name="mobileno">
        <span class="error">* <?php echo $mobilenoErr; ?> </span>

        <input type="text" name="website">
        <span class="error"><?php echo $websiteErr; ?> </span>
        <br><br>

        <!-- <label>Gender :</label> -->
        <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female
        <input type="radio" name="gender" value="Other"> Other
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>

        <label> Agree to Terms of Service:</label>
        <input type="checkbox" name="agree">
        <span class="error">* <?php echo $agreeErr; ?> </span>
        <br><br>


        <input type="submit" name="submit" value="Submit">
        <br><br>

    </form>

    <?php
    if (isset($_POST['submit'])) {
        if ($nameErr == "") {
            echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";
            echo "<h2>Your Input:</h2>";
            echo "Name: " . $name;
        } else {
            echo "<h3> <b>You did not fill up the form correctly.</b> </h3>";
        }
    }
    ?>
</body>

</html>