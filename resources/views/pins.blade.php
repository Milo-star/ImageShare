@vite('resources/css/app.css')
<title>ImageShare - {{ $pin->title }}</title>
<div class="max-w-lg mx-auto">
  <img src="{{ $pin->image_url }}" alt="{{ $pin->title }}" class="object-cover">
  <div class="bg-white shadow-lg rounded-lg px-4 py-6 mt-4">
    <h1 class="text-2xl font-bold mb-4">{{ $pin->title }}</h1>
    <p class="text-gray-600">{{ $pin->description }}</p>
    <div class="mt-6 flex justify-between items-center">
        <div class="flex items-center">
            <a href="{{ route('profil.show', $pin->user->id) }}" class="text-gray-700">{{ $pin->user->name }}</a>
        </div>
        <div class="text-gray-500 text-sm">{{ $pin->created_at->diffForHumans() }}</div>
    </div>
  </div>
</div>

