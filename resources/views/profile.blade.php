@vite('resources/css/app.css')
<title>ImageShare - Profil</title>
<div class="max-w-md mx-auto bg-white p-8 border-gray-300 border rounded-md">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-medium text-gray-700">Mon profil</h1>
        <form action="{{ route('logout') }}" method="POST" class="relative">
            @csrf
            <button type="submit" class="focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="none" d="M0 0h24v24H0z"/>
                <path d="M14 22H3a1 1 0 01-1-1V3a1 1 0 011-1h11v2H4v16h10v-5h2v5a1 1 0 01-1 1zM18.803 9.942l-1.407 1.406L19.18 12l-1.784 1.652 1.407 1.406L21.01 12l-2.207-2.058zm-9.606 0L8.79 11.348l-1.407-1.406L6.82 12l1.784 1.652-1.407 1.406L5 12l2.207-2.058z"/>
            </svg>
            </button>
        </form>
    </div>
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
    <form action="{{ route('profil.update') }}" method="POST" class="mt-6">
    @csrf
    @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">
                Nom
            </label>
            <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Adresse email
            </label>
            <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Mettre à jour</button>
        </div>
    </form>
</div>
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p>{{ session('success') }}</p>
    </div>
@endif