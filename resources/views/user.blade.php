@vite('resources/css/app.css')
<title> Profil | {{$user->name}} </title>
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
    <div>
      <a href="{{ route('login') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-900 hover:bg-white mt-4 lg:mt-0 mx-4">Login</a>
    </div>
    <div>
      <a href="{{ route('register') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-900 hover:bg-white mt-4 lg:mt-0">S'inscrire</a>
    </div>
  </div>
</nav>

<!-- En-tête -->
<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col items-center justify-between">
        <div class="flex items-center">
            <!-- Photo de profil -->
            <img class="h-12 w-12 rounded-full object-cover mr-4" src="https://i.pinimg.com/150x150_RS/98/29/63/9829633e457ad3340d8619d748326ef1.jpg">
            <!-- Nom d'utilisateur -->
            <div class="flex flex-col">
                <h1 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h1>
                <p class="text-gray-600">{{ $user->description }}</p>
            </div>   
        </div>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div class="text-center">
                <span class="font-bold text-gray-900">Abonnés</span>
                <br>
                <span class="text-gray-500">{{$user->followers}}</span>
            </div>
            <div class="text-center">
                <span class="font-bold text-gray-900">Abonnements</span>
                <br>
                <span class="text-gray-500">{{$user->following}}</span>
            </div>
        </div>
        <div class="mt-4 flex items-center">
            <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                Contacter
            </button>
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2">
                Suivre
            </button>
        </div>
        <div class="mt-10">
        <h2 class="text-2xl font-bold mb-4">Articles de {{ $user->name }}</h2>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($user->pins as $pin)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <a href="{{ route('pins.show', $pin->id) }}">
                    <img src="{{ $pin->image_url }}" alt="{{ $pin->title }}" class="object-cover h-56 w-full">
                </a>
                <div class="p-4">
                    <h2 class="text-lg font-bold mb-2">{{ $pin->title }}</h2>
                    <p class="text-gray-600">{{ $pin->description }}</p>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="flex items-center">
                            <a href="{{ route('profil.show', $pin->user->id) }}" class="text-gray-700">{{ $pin->user->name }}</a>
                        </div>
                        <div class="text-gray-500 text-sm">{{ $pin->created_at }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



