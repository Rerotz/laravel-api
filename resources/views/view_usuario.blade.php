<!DOCTYPE html>
<html>
<head>
    <title>Información del Usuario</title>
</head>
<body>
    <h1>Bienvenido, {{ $user['name'] }}</h1>
    <p>Email: {{ $user['email'] }}</p>
    <p>Fecha de Nacimiento: {{ $user['date_of_birth'] }}</p>
    <p>Sexo: {{ $user['gender'] }}</p>
</body>
</html>
