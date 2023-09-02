<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Email;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                    'Simpósio de Telemedicina Moderna',
                    'Congresso Internacional de Cardiologia',
                    'Conferência de Avanços em Oncologia',
                    'Seminário de Neurociência Clínica',
                    'Workshop de Cirurgia Robótica',
                    'Fórum de Saúde Mental e Bem-Estar',
                    'Congresso de Medicina Esportiva',
                    'Feira de Tecnologias Médicas',
                    'Simpósio de Medicina Integrativa',
                    'Encontro de Pesquisa em Genética Médica',
                    'Conferência de Farmacologia Clínica',
                    'Simpósio sobre Medicina Preventiva',
                    'Congresso de Radiologia e Imagem',
                    'Workshop de Terapias Alternativas',
                    'Seminário de Avanços em Pediatria',
                    'Conferência de Dermatologia Avançada',
                    'Fórum de Medicina de Emergência',
                    'Encontro de Cirurgia Plástica',
                    'Feira de Dispositivos Médicos',
                    'Simpósio de Geriatria e Gerontologia',
                    'Congresso de Obstetrícia e Ginecologia',
                    'Workshop de Educação Médica Continuada',
                    'Seminário de Endocrinologia Clínica',
                    'Conferência de Nutrição e Dietética',
                    'Fórum de Pesquisa em Medicina',
                    'Encontro de Anestesiologia',
                    'Feira de Inovação em Saúde',
                    'Simpósio de Medicina Personalizada',
                    'Congresso de Imunologia Médica'
                ]),
            'slug' => $this->faker->unique()->slug(),
            'description' => $this->faker->text(),
            'cover_path' => $this->faker->word(),
            'is_active' => $this->faker->boolean(),
            'primary_color' => $this->faker->hexColor(),
            'secondary_color' => $this->faker->hexColor(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Event $event) {
            $email = Email::factory()->create([
                'subject' => 'Artigos Científicos - Evento: ' . $event->name,
                'event_id' => $event->id,
            ]);
            $event->categories()->attach(Category::inRandomOrder()->limit(3)->get());
            $event->articles()->attach(Article::inRandomOrder()->limit(10)->get());
        });
    }
}


