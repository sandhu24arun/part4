<?php include 'view/header.php'; ?>
<main>
    <body>

    <h2>Login</h2>

    <form action="login/index.php" method="post" id="login_form">
        <input type="hidden" name="action" value="login_user">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="pword">Password:</label><br>
        <input type="password" id="pword" name="password" required><br><br>
        <input type="submit" value="Submit">
    </form>


    </body>


    <style>

        main {display: flex;}
        main > * {border: 1px solid;}
        body {background: #b6e3e2;
            text-align: center;
        }
        h2 {  border:  1px solid;
            padding: 10px;
            min-width: 200px;
            background: #8fb5b4;
            box-sizing: border-box;

        }
        label{border-collapse: collapse; font-family: helvetica;
            text-align: center;}
    </style>
</main>
<?php include 'view/footer.php'; ?>