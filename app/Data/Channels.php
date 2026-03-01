<?php

namespace App\Data;

class Channels
{
    public static function all(): array
    {
        return [
            // ─── Noticias ───
            [
                'id'          => 1,
                'name'        => 'TN — Todo Noticias',
                'slug'        => 'tn',
                'category'    => 'Noticias',
                'description' => 'Canal de noticias 24 horas del grupo Clarín. Información, análisis y debates.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/TN_-_Todo_Noticias_%28Logo%29.png/320px-TN_-_Todo_Noticias_%28Logo%29.png',
                'color'       => '#1D4ED8',
            ],
            [
                'id'          => 2,
                'name'        => 'C5N',
                'slug'        => 'c5n',
                'category'    => 'Noticias',
                'description' => 'Canal de noticias nacional con cobertura política y social.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/C5N.svg/320px-C5N.svg.png',
                'color'       => '#DC2626',
            ],
            [
                'id'          => 3,
                'name'        => 'A24',
                'slug'        => 'a24',
                'category'    => 'Noticias',
                'description' => 'Noticias, política y economía con periodismo de investigación.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/A24_logo.png/320px-A24_logo.png',
                'color'       => '#F59E0B',
            ],
            [
                'id'          => 4,
                'name'        => 'Infobae TV',
                'slug'        => 'infobae-tv',
                'category'    => 'Noticias',
                'description' => 'Señal de noticias del portal Infobae, actualidad las 24 horas.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Infobae_logo.png/320px-Infobae_logo.png',
                'color'       => '#0F172A',
            ],

            // ─── Entretenimiento ───
            [
                'id'          => 5,
                'name'        => 'Telefe',
                'slug'        => 'telefe',
                'category'    => 'Entretenimiento',
                'description' => 'Uno de los canales más vistos de Argentina. Novelas, reality shows y entretenimiento.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Telefe_2021.svg/320px-Telefe_2021.svg.png',
                'color'       => '#7C3AED',
            ],
            [
                'id'          => 6,
                'name'        => 'El Trece',
                'slug'        => 'el-trece',
                'category'    => 'Entretenimiento',
                'description' => 'Canal de entretenimiento con ficciones, talk shows y reality.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/El_Trece_logo_2020.svg/320px-El_Trece_logo_2020.svg.png',
                'color'       => '#059669',
            ],
            [
                'id'          => 7,
                'name'        => 'América TV',
                'slug'        => 'america-tv',
                'category'    => 'Entretenimiento',
                'description' => 'Entretenimiento, actualidad y programas de debate.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/37/Am%C3%A9rica_TV_logo_2017.svg/320px-Am%C3%A9rica_TV_logo_2017.svg.png',
                'color'       => '#D97706',
            ],

            // ─── Deportes ───
            [
                'id'          => 8,
                'name'        => 'ESPN',
                'slug'        => 'espn',
                'category'    => 'Deportes',
                'description' => 'El canal líder en deportes: fútbol, NBA, tenis y más.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/ESPN_wordmark.svg/320px-ESPN_wordmark.svg.png',
                'color'       => '#DC2626',
            ],
            [
                'id'          => 9,
                'name'        => 'TyC Sports',
                'slug'        => 'tyc-sports',
                'category'    => 'Deportes',
                'description' => 'Fútbol argentino y sudamericano, boxeo y deportes en general.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/TyC_Sports_logo.png/320px-TyC_Sports_logo.png',
                'color'       => '#1D4ED8',
            ],
            [
                'id'          => 10,
                'name'        => 'DirecTV Sports',
                'slug'        => 'directv-sports',
                'category'    => 'Deportes',
                'description' => 'Cobertura deportiva internacional: Champions League, F1 y más.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/DIRECTV_Sports.png/320px-DIRECTV_Sports.png',
                'color'       => '#0EA5E9',
            ],

            // ─── Cultura ───
            [
                'id'          => 11,
                'name'        => 'Canal Encuentro',
                'slug'        => 'encuentro',
                'category'    => 'Cultura',
                'description' => 'Canal educativo y cultural del Ministerio de Educación de Argentina.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Logo_Canal_Encuentro.png/320px-Logo_Canal_Encuentro.png',
                'color'       => '#7C3AED',
            ],
            [
                'id'          => 12,
                'name'        => 'Paka Paka',
                'slug'        => 'paka-paka',
                'category'    => 'Infantil',
                'description' => 'Canal infantil educativo con contenidos para niños y niñas.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Paka_Paka_logo.png/320px-Paka_Paka_logo.png',
                'color'       => '#10B981',
            ],
            [
                'id'          => 13,
                'name'        => 'TV Pública',
                'slug'        => 'tv-publica',
                'category'    => 'Cultura',
                'description' => 'El canal estatal argentino con noticias, cultura y entretenimiento.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/TV_P%C3%BAblica_logo.svg/320px-TV_P%C3%BAblica_logo.svg.png',
                'color'       => '#1D4ED8',
            ],

            // ─── Infantil ───
            [
                'id'          => 14,
                'name'        => 'Cartoon Network',
                'slug'        => 'cartoon-network',
                'category'    => 'Infantil',
                'description' => 'Animaciones y caricaturas para niños con los mejores personajes.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/80/Cartoon_Network_2010_logo.svg/320px-Cartoon_Network_2010_logo.svg.png',
                'color'       => '#F59E0B',
            ],
            [
                'id'          => 15,
                'name'        => 'Disney Channel',
                'slug'        => 'disney-channel',
                'category'    => 'Infantil',
                'description' => 'Entretenimiento familiar y series originales de Disney.',
                'logo'        => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Disney_Channel_2014.svg/320px-Disney_Channel_2014.svg.png',
                'color'       => '#1D4ED8',
            ],
        ];
    }

    public static function categories(): array
    {
        return array_values(array_unique(array_column(self::all(), 'category')));
    }

    public static function byCategory(string $category): array
    {
        if ($category === 'Todos') {
            return self::all();
        }

        return array_values(array_filter(self::all(), fn ($c) => $c['category'] === $category));
    }

    public static function find(int $id): ?array
    {
        foreach (self::all() as $channel) {
            if ($channel['id'] === $id) {
                return $channel;
            }
        }

        return null;
    }
}
