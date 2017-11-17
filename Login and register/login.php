<!DOCTYPE html>
<html>
<head>
    <title>Log in</title>
    <meta name="content-type"; charset=UTF-8">
</head>
<body>
<div class="content" align="center">

    <div class="header">
        <h1>Log in</h1>
    </div>
    <div id="menu">
        <a class="item" href="../Main%20page/Main.php">Home</a>
    </div>
    <div class="middle">
        <form id="loginform" action="loginaction.php" method="post">
            <table border="0">
                <tr>
                    <td>Username：</td>
                    <td>
                        <input type="text" id="name" name="username" required="required">
                    </td>
                </tr>
                <tr>
                    <td>Password：</td>
                    <td><input type="password" id="password" name="password"></td>
                </tr>

                <tr>
                    <td colspan="2" align="center" style="color:red;font-size:10px;">

                        <?php
                        $err=isset($_GET["err"])?$_GET["err"]:"";
                        switch($err) {
                            case 1:
                                echo "Incorrect username or password.";
                                break;
                            case 2:
                                echo "Empty username or password";
                                break;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" align="center">
                        <input type="submit" id="login" name="login" value="Log in">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <a href="register.php">Sign up</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>