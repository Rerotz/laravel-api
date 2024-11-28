<!-- register.blade.php -->
<h2>Registro</h2>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="name" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Contraseña:</label>
    <input type="password" name="password" required>
    <label>Confirmar Contraseña:</label>
    <input type="password" name="password_confirmation" required>
    <label>Fecha de Nacimiento:</label>
    <input type="date" name="date_of_birth" required>
    <label>Sexo:</label>
    <select name="gender">
        <option value="male">Masculino</option>
        <option value="female">Femenino</option>
        <option value="other">Otro</option>
    </select>
    <button type="submit">Registrar</button>
</form>
