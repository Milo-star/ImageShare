@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
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

<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-8 border-gray-300 border rounded-md">
            <h1 class="text-xl font-medium text-gray-700 mb-4">Connexion</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="email">Adresse e-mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-3 py-2 border rounded-md border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-3 py-2 border rounded-md border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 px-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600">
                    Se connecter
                </button>

                <div class="flex justify-between">
                    <button>
                        <a href="{{ route('welcome') }}" class="text-blue-500 hover:text-blue-600">Retour à l'accueil</a>
                    </button>
                    <button>
                        <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-600 ">S'inscrire</a>
                    </button>
                </div>
                
                @if ($errors->has('email'))
                    <div class="text-red-500 mt-2">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                @if ($errors->has('password'))
                    <div class="text-red-500 mt-2">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
