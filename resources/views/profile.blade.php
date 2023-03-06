@vite('resources/css/app.css')
<title>ImageShare - Profil</title>
<nav class="flex items-center justify-between flex-wrap bg-gray-800 p-6">
  <div class="flex items-center flex-shrink-0 text-white mr-6">
    <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M22.5 25.5V7.875L13.5 16.875L9 12.375L27 0L45 12.375L40.5 16.875L31.5 7.875V25.5C31.5 30.15 28.35 34.125 22.5 34.125C16.65 34.125 13.5 30.15 13.5 25.5H22.5ZM40.5 22.5H49.5V45C49.5 49.65 46.35 53.625 40.5 53.625C34.65 53.625 31.5 49.65 31.5 45V22.5H40.5Z"/></svg>
    <span class="font-semibold text-xl tracking-tight">ImageShare</span>
  </div>
  <div class="block lg:hidden">
    <button class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-white hover:border-white">
      <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><g><rect y="9" width="20" height="2"/><rect y="3" width="20" height="2"/><rect y="15" width="20" height="2"/></g></svg>
    </button>
  </div>
  <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
    <div class="text-sm lg:flex-grow">
      <a href="{{ route('welcome') }}" class="block mt-4 lg:inline-block lg:mt-0 text-gray-300 hover:text-white mr-4">
        Accueil
      </a>
      <a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-gray-300 hover:text-white mr-4">
        Crée un partage
      </a>
    </div>
    @auth
      <div>
        <a href="{{ route('profile') }}" ><img src="https://cdn-icons-png.flaticon.com/32/847/847969.png" alt="Profile Picture" class="mx-4"></a>
      </div>
    @else
      <div>
        <a href="{{ route('login') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-900 hover:bg-white mt-4 lg:mt-0 mx-4">Login</a>
      </div>
      <div>
        <a href="{{ route('register') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-900 hover:bg-white mt-4 lg:mt-0">S'inscrire</a>
      </div>
    @endauth
  </div>
</nav>

<div class="max-w-md mx-auto bg-white p-8 border-gray-300 border rounded-md m-5">
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
            <img src="https://i.pinimg.com/150x150_RS/98/29/63/9829633e457ad3340d8619d748326ef1.jpg" alt="Profile Picture">
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
                Nom:
            </label>
            <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Adresse email:
            </label>
            <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="description">
                Description (max: 255):
            </label>
            <input type="text" id="description" name="description" value="{{ auth()->user()->description }}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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