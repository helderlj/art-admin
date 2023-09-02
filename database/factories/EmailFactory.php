<?php

namespace Database\Factories;

use App\Models\Email;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EmailFactory extends Factory
{
    protected $model = Email::class;

    public function definition(): array
    {
        return [
            'subject' => "Artigos Científicos",
            'body' => "Prezado(a) Dr(a) Oliver Raphael Costa Aguiar;
                        Segue sua seleção de artigos realizada espontaneamente no 76 Congresso da Sociedade Brasileira de Dermatologia.
                        O material está sendo disponibilizado para leitura durante o evento.
                        Os documentos são para seu uso exclusivo, com finalidade única de esclarecer questionamentos científicos, sendo vetada a sua reprodução, cópia, distribuição ou qualquer outro uso diverso que não o educacional pessoal, de acordo com a Lei 9.610/1998.
                        Vale ressaltar que as informações são de total responsabilidade dos autores, não refletindo, necessariamente a opinião do Grupo Sanofi.
                        Adicionalmente, esclarecemos que o Grupo Sanofi recomenda o uso de seus medicamentos e produtos somente de acordo com as informações aprovadas em bula.
                        Agradecemos seu interesse e nos colocamos à disposição para eventuais dúvidas.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
