@vite('resources/css/app.css')
<title>ImageShare - Accueil</title>
<div class="container mx-auto py-8">
  <h1 class="text-3xl font-bold mb-8">Tous les partages</h1>
  <div class="grid grid-cols-3 gap-4">
    @foreach ($pins as $pin)
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
      <a href="{{ route('profil.show', $pin->user->id) }}">
        <img src="{{ $pin->image_url }}" alt="{{ $pin->title }}" class="object-cover h-56 w-full">
      </a>
      <div class="p-4">
        <h2 class="text-lg font-bold mb-2">{{ $pin->title }}</h2>
        <p class="text-gray-600">{{ $pin->description }}</p>
        <div class="mt-4 flex justify-between items-center">
          <div class="flex items-center">
            <a href="{{ route('profile', ['user' => $pin->user->id]) }}" class="text-gray-700">{{ $pin->user->name }}</a>
          </div>
          <div class="text-gray-500 text-sm">{{ $pin->created_at }}</div>
        </div>
      </div>
    </div>
  @endforeach

  </div>
</div>



