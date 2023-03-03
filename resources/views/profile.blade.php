<title>Profil</title>

<h1>Profil</h1>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Déconnexion</button>
</form>

