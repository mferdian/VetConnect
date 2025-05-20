<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Artikel - VetConnect</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('layouts._navbar')

    <!-- Artikel Section -->
    <section class="container px-6 mx-auto mt-12">
        <div class="space-y-8">

            @foreach ($articles as $article)
                <div class="flex flex-col items-center overflow-hidden bg-white rounded-lg shadow-md md:flex-row">
                    <div class="p-6 md:w-3/5">
                        <h2 class="text-lg font-bold text-gray-800">{{ $article->judul }}</h2>
                        <p class="mt-2 text-gray-600">{{ Str::limit(strip_tags($article->isi), 100) }}</p>
                        <a href="{{ route('articles.show', $article->id) }}"
                           class="mt-4 inline-block bg-[#497D74] text-white px-4 py-2 rounded-md hover:bg-[#3b665d]">
                            Selengkapnya
                        </a>
                    </div>

                    @if (!empty($article->gambar) && is_array($article->gambar) && isset($article->gambar[0]))
                        @php
                            // Cek apakah path sudah lengkap atau belum
                            $imagePath = Str::startsWith($article->gambar[0], 'articles/gambar/')
                                ? $article->gambar[0]
                                : 'articles/gambar/' . $article->gambar[0];
                        @endphp

                        <img src="{{ asset('storage/' . $imagePath) }}"
                             alt="{{ $article->judul }}"
                             class="object-cover w-full h-48 md:w-2/5">
                    @else
                        <div class="flex items-center justify-center w-full h-48 text-gray-500 bg-gray-200 md:w-2/5">
                            Tidak ada gambar
                        </div>
                    @endif
                </div>
            @endforeach

        </div>
    </section>

</body>
</html>
