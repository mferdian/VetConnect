    @extends('layouts.app')

    @section('content')
        <div class="max-w-xl p-4 mx-auto">
            <h2 class="mb-4 text-xl font-bold">Beri Review untuk Dr. {{ $booking->vet->nama }}</h2>

            <form method="POST" action="{{ route('review.store', $booking) }}">
                @csrf
                <div class="mb-4">
                    <label class="block font-medium">Rating (1 - 5)</label>
                    <input type="number" name="rating" min="1" max="5" required class="w-full p-2 border" />
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Review (Opsional)</label>
                    <textarea name="review" rows="4" class="w-full p-2 border"></textarea>
                </div>

                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded">Kirim Review</button>
            </form>
        </div>
    @endsection
