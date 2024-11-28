<!-- profile.blade.php -->
<h2>Perfil</h2>
<p>Nombre: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<p>Fecha de Nacimiento: {{ $user->date_of_birth }}</p>
<p>Género: {{ $user->gender }}</p>
<p>Rol: {{ $user->role }}</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Cerrar Sesión</button>
</form>
