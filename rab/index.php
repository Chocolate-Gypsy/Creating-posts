<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
<form action="regist.php" method="post">
    <input type="text" placeholder="login" name="login">
    <input type="text" placeholder="password" name="pass">
    <input type="text" placeholder="repeat password" name="repeatpass">
    <input type="text" placeholder="email" name="email">
    <input type="file" name="avatar"> 
    <button type="submit">Зарегестрироваться</button>
</form>

<form action="login.php" method="post">
<input type="text" placeholder="login" name="login">
<input type="text" placeholder="password" name="pass">
<button tupe="submit">Войти</button>
</form>

</body>
</html>