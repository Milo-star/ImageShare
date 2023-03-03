@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-8 border-gray-300 border rounded-md">
            <h1 class="text-xl font-medium text-gray-700 mb-4">Inscription</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="name">Nom</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-3 py-2 border rounded-md border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="email">Adresse e-mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-3 py-2 border rounded-md border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="password">Mot de passe</label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-3 py-2 border rounded-md border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="password_confirmation">Confirmation du mot de passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full px-3 py-2 border rounded-md border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 px-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600">
                    S'inscrire
                </button>

                <div class="flex justify-between">
                    <button>
                        <a href="{{ route('welcome') }}" class="text-blue-500 hover:text-blue-600">Retour à l'accueil</a>
                    </button>
                    <button>
                        <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-600 ">Se connecter</a>
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
</html>