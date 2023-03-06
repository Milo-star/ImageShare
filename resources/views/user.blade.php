@vite('resources/css/app.css')
<title> Profil | {{$user->name}} </title>
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
    </div>
</div>



