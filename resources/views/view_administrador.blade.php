<!DOCTYPE html>
<html>
<head>
    <title>Información del Administrador</title>
</head>
<body>
    <h1>Bienvenido, Administrador {{ $user['name'] }}</h1>
    <p>Email: {{ $user['email'] }}</p>
    <p>Fecha de Nacimiento: {{ $user['date_of_birth'] }}</p>
    <p>Sexo: {{ $user['gender'] }}</p>
    <!-- Aquí puedes agregar opciones especiales solo para administradores -->
</body>
</html>
