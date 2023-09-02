<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                    'Dermatite Atópica',
                    'Prurigo Nodular',
                    'Asma',
                    'Hipertensão Arterial',
                    'Diabetes Mellitus Tipo 2',
                    'Enxaqueca',
                    'Artrite Reumatoide',
                    'Depressão Maior',
                    'Ansiedade Generalizada',
                    'Doença de Crohn',
                    'Esquizofrenia',
                    'Insuficiência Cardíaca Congestiva',
                    'Doença Pulmonar Obstrutiva Crônica (DPOC)',
                    'Transtorno Bipolar',
                    'Lupus Eritematoso Sistêmico',
                    'Alzheimer',
                    'Anemia Ferropriva',
                    'Enfisema',
                    'Fibromialgia',
                    'Transtorno do Déficit de Atenção e Hiperatividade (TDAH)',
                    'Síndrome do Intestino Irritável (SII)',
                    'Hipotireoidismo',
                    'Hipertireoidismo',
                    'Doença de Parkinson',
                    'Doença Renal Crônica',
                    'Acidente Vascular Cerebral (AVC)',
                    'Artrite Gotosa',
                    'Síndrome do Ovário Policístico (SOP)',
                    'Esclerose Múltipla',
                    'Câncer de Mama'
                ]),
            'description' => $this->faker->text(),
            'cover_path' => $this->faker->word(),
            'is_visible' => $this->faker->boolean(),
            'bg_primary_color' => $this->faker->hexColor(),
            'bg_secondary_color' => $this->faker->hexColor(),
            'text_primary_color' => $this->faker->hexColor(),
            'text_secondary_color' => $this->faker->hexColor(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
