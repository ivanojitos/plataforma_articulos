<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Articulo;
use App\Models\Categoria;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tecnologia = Categoria::where('slug', 'tecnologia')->first();
        $diseno = Categoria::where('slug', 'diseno')->first();
        $negocios = Categoria::where('slug', 'negocios')->first();

        $articulos = [
            [
                'categoria_id' => $tecnologia->id,
                'titulo' => 'El futuro de la inteligencia artificial',
                'descripcion' => 'Una introducción a las nuevas tendencias de inteligencia artificial.',
                'contenido' => 'La inteligencia artificial continúa transformando diferentes industrias y cambiando la manera en que trabajamos.',
            ],
            [
                'categoria_id' => $tecnologia->id,
                'titulo' => 'Cómo mejorar la seguridad de una aplicación web',
                'descripcion' => 'Buenas prácticas para desarrollar aplicaciones web más seguras.',
                'contenido' => 'La seguridad debe considerarse desde las primeras etapas del desarrollo de cualquier aplicación web.',
            ],
            [
                'categoria_id' => $tecnologia->id,
                'titulo' => 'Introducción al desarrollo con Laravel',
                'descripcion' => 'Conceptos fundamentales para comenzar a desarrollar aplicaciones con Laravel.',
                'contenido' => 'Laravel es uno de los frameworks PHP más utilizados para desarrollar aplicaciones web modernas.',
            ],
            [
                'categoria_id' => $tecnologia->id,
                'titulo' => 'Bases de datos para aplicaciones modernas',
                'descripcion' => 'Conceptos esenciales sobre bases de datos relacionales.',
                'contenido' => 'Una buena estructura de base de datos permite construir aplicaciones eficientes y fáciles de mantener.',
            ],
            [
                'categoria_id' => $tecnologia->id,
                'titulo' => 'APIs REST y aplicaciones web',
                'descripcion' => 'Qué son las APIs REST y por qué son importantes.',
                'contenido' => 'Las APIs REST permiten que diferentes aplicaciones puedan comunicarse mediante HTTP.',
            ],

            [
                'categoria_id' => $diseno->id,
                'titulo' => 'Principios básicos del diseño UX',
                'descripcion' => 'Conceptos fundamentales para crear mejores experiencias digitales.',
                'contenido' => 'El diseño UX busca crear productos digitales útiles, accesibles y fáciles de utilizar.',
            ],
            [
                'categoria_id' => $diseno->id,
                'titulo' => 'La importancia de la tipografía',
                'descripcion' => 'Cómo elegir correctamente las fuentes para un proyecto digital.',
                'contenido' => 'La tipografía influye directamente en la legibilidad, personalidad y percepción de una interfaz.',
            ],
            [
                'categoria_id' => $diseno->id,
                'titulo' => 'Colores y emociones en el diseño',
                'descripcion' => 'Cómo utilizar el color para comunicar mejor.',
                'contenido' => 'Los colores pueden transmitir diferentes emociones y ayudar a establecer una identidad visual.',
            ],
            [
                'categoria_id' => $diseno->id,
                'titulo' => 'Diseño responsive para sitios web',
                'descripcion' => 'Buenas prácticas para diseñar interfaces adaptables.',
                'contenido' => 'Un sitio responsive debe ofrecer una experiencia adecuada en computadoras, tablets y dispositivos móviles.',
            ],
            [
                'categoria_id' => $diseno->id,
                'titulo' => 'Errores comunes en diseño web',
                'descripcion' => 'Los errores más frecuentes que debemos evitar al diseñar una interfaz.',
                'contenido' => 'Una interfaz complicada puede provocar que los usuarios abandonen rápidamente un sitio web.',
            ],

            [
                'categoria_id' => $negocios->id,
                'titulo' => 'Cómo iniciar un negocio digital',
                'descripcion' => 'Algunos pasos importantes para comenzar un proyecto empresarial en internet.',
                'contenido' => 'Un negocio digital necesita una propuesta de valor clara, conocer a sus clientes y establecer objetivos medibles.',
            ],
            [
                'categoria_id' => $negocios->id,
                'titulo' => 'Marketing digital para pequeñas empresas',
                'descripcion' => 'Estrategias de marketing para pequeños negocios.',
                'contenido' => 'Las herramientas digitales permiten a las pequeñas empresas llegar a nuevos clientes con presupuestos controlados.',
            ],
            [
                'categoria_id' => $negocios->id,
                'titulo' => 'Cómo definir una propuesta de valor',
                'descripcion' => 'Aprende a comunicar qué hace diferente a tu negocio.',
                'contenido' => 'Una propuesta de valor debe explicar claramente qué problema resuelve un producto o servicio.',
            ],
            [
                'categoria_id' => $negocios->id,
                'titulo' => 'Métricas importantes para un negocio',
                'descripcion' => 'Indicadores que ayudan a medir el rendimiento de una empresa.',
                'contenido' => 'Las métricas permiten tomar decisiones basadas en información y conocer la evolución de un negocio.',
            ],
            [
                'categoria_id' => $negocios->id,
                'titulo' => 'Planificación y crecimiento empresarial',
                'descripcion' => 'Cómo establecer objetivos para hacer crecer un negocio.',
                'contenido' => 'Una buena planificación ayuda a establecer prioridades y utilizar mejor los recursos disponibles.',
            ],
        ];

        foreach ($articulos as $articulo) {
            Articulo::updateOrCreate(
                ['slug' => Str::slug($articulo['titulo'])],
                [
                    'categoria_id' => $articulo['categoria_id'],
                    'titulo' => $articulo['titulo'],
                    'descripcion' => $articulo['descripcion'],
                    'contenido' => $articulo['contenido'],
                ]
            );
        }
    }
}
