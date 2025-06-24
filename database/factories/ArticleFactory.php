<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Vet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'vet_id' => Vet::inRandomOrder()->first()->id, // pastikan Vet sudah ada sebelum ini dipanggil
            'judul' => $this->faker->sentence(),
            'isi' => $this->faker->paragraphs(3, true),
            'gambar' => 'articles/' . $this->faker->image('public/storage/articles', 640, 480, null, false),
        ];
    }
}
