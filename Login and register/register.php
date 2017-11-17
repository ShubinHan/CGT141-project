<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="content-type"; charset=UTF-8">
</head>
<body>
<div class="content">

    <div class="header">
        <h3>Sign Up</h3>
    </div>
    <div id="menu">
        <a class="item" href="./login.php">Login</a>
    </div>
    <div class="middle">
        <form action="registeraction.php" method="post">
            <table border="0">
                <tr>
                    <td>Username：</td>
                    <td><input type="text" id="id_name" name="username" required="required"></td>
                </tr>

                <tr>
                    <td>Password：</td>
                    <td><input type="password" id="password" name="password" required="required"></td>
                </tr>

                <tr>
                    <td colspan="2" align="center" style="color:red;font-size:10px;">
                        <?php
                        $err=isset($_GET["err"])?$_GET["err"]:"";
                        switch($err) {
                            case 1:
                                echo "Username not available.";
                                break;
                            case 2:
                                echo "Sign up successfully";
                                break;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" id="register" name="register" value="Sign up">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</div>
</body>
</html>