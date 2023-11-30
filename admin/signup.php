<?php require_once('../config.php') ?>
<!DOCTYPE html>
<?php require_once('inc/header.php') ?>
<html lang="en">

<body class="hold-transition login-page  dark-mode">
  <style>
    body{
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
      background-size:cover;
      background-repeat:no-repeat;
    }
    .login-title{
      text-shadow: 2px 2px black
    }
  </style>
  <h1 class="text-center py-5 login-title"><b><?php echo $_settings->info('name') ?></b></h1>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<title>Sign Up</title> 
<style>
  

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        label {
            display: block;
            color: black;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>

    <form id="signup" action="insert_db.php" method="post">
        <label for="firstname">Firstname:</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="lastname">lastname:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="password">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>


        <button type="button" onclick="submitform()">Sign Up</button>

        <script>
            function submitform(){
                document.getElementById('signup').submit();
            }
        </script>
    </form>

</body>
</html>