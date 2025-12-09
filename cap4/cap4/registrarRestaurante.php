<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registrar restaurante</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form method="post" action="login.php">
        <label for="correo">correo</label>
        <input type="text" id="correo" name="correo" required><br><br>
        <label for="clave">clave</label>
        <input type="password" id="clave" name="clave" required><br><br>
        <label for="pais">pais</label>
        <input type="text" id="pais" name="pais" required><br><br>
        <label for="cp">cp</label>
        <input type="text" id="cp" name="cp" required><br><br>
        <label for="ciudad">ciudad</label>
        <input type="text" id="ciudad" name="ciudad" required><br><br>
        <label for="direccion">direccion</label>
        <input type="text" id="direccion" name="direccion" required><br><br>
        <label for="rol">rol</label>
        <input type="text" id="rol" name="rol" required><br><br>
        <input type="submit">
    </form>
</body>
</html>