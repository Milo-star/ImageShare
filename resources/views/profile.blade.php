@vite('resources/css/app.css')
<title>Profil</title>
<div class="max-w-md mx-auto bg-white p-8 border-gray-300 border rounded-md">
    <h1 class="text-2xl font-medium text-gray-700 mb-4">Mon profil</h1>
    <div class="flex items-center mb-6">
        <div class="w-20 h-20 rounded-full overflow-hidden">
            <img src="https://via.placeholder.com/150" alt="Profile Picture">
        </div>
        <div class="ml-6">
            <h2 class="text-lg font-medium text-gray-700">{{ auth()->user()->name }}</h2>
            <p class="text-gray-500">{{ auth()->user()->email }}</p>
            <p class="text-gray-500">Inscription le {{ auth()->user()->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
    <div class="border-t border-gray-300 pt-6">
        <h3 class="text-lg font-medium text-gray-700 mb-2">Informations personnelles</h3>
        <form action="{{ route('update.profile') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nom:</label>
                <input type="text" name="name" value="{{ auth()->user()->name }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Adresse e-mail:</label>
                <input type="email" name="email" value="{{ auth()->user()->email }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Mettre à jour</button>
            <form action="{{ route('logout') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Déconnexion</button>
            </form>
        </form>
        @if(session('success'))
        <div class="bg-green-200 text-green-700 p-4 mb-4 rounded-md">{{ session('success') }}</div>
        @endif

    </div>
</div>
