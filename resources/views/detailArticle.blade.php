<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('layouts._navbar')

    <!-- Main Content -->
    <section class="container flex flex-col gap-8 px-6 mx-auto mt-12 md:flex-row">

        <!-- Artikel Utama -->
        <div class="p-6 bg-white rounded-lg shadow-md md:w-3/4">
            <h1 class="text-2xl font-bold text-gray-800">{{ $article->judul }}</h1>
            <p class="mt-1 text-sm text-gray-500">Ditulis oleh Vet ID: {{ $article->vet_id }} | {{ $article->created_at->format('d M Y') }}</p>

            @if (!empty($article->gambar) && is_array($article->gambar))
                <img src="{{ asset('storage/' . $article->gambar[0]) }}" alt="{{ $article->judul }}" class="object-cover w-full mt-4 rounded-lg h-80">
            @endif

            <p class="mt-6 text-gray-700">
                {!! nl2br(e($article->isi)) !!}
            </p>
        </div>

        <!-- Sidebar Artikel Terkait -->
        <aside class="md:w-1/4">
            <h2 class="mb-4 text-lg font-semibold text-gray-800">Artikel Terkait</h2>
            <ul class="space-y-4">
                @foreach ($relatedArticles as $related)
                    <li class="flex items-center gap-4 p-3 bg-white rounded-lg shadow">
                        @if (!empty($related->gambar) && is_array($related->gambar))
                            <img src="{{ asset('storage/' . $related->gambar[0]) }}" alt="{{ $related->judul }}" class="object-cover w-16 h-16 rounded-md">
                        @endif
                        <a href="{{ route('articles.show', $related->id) }}" class="text-gray-700 hover:text-[#497D74]">
                            {{ Str::limit($related->judul, 40) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>

    </section>

</body>
</html>
