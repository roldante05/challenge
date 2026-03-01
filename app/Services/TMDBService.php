<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class TMDBService
{
    private string $baseUrl;
    private string $imageBaseUrl;
    private string $apiKey;
    private int $cacheTtl;

    public function __construct()
    {
        $this->apiKey       = config('tmdb.api_key');
        $this->baseUrl      = config('tmdb.base_url');
        $this->imageBaseUrl = config('tmdb.image_base_url');
        $this->cacheTtl     = config('tmdb.cache_ttl');
    }

    // ──────────────────────────────────────────
    //  Movies
    // ──────────────────────────────────────────

    public function getPopularMovies(int $page = 1): array
    {
        return $this->cached("movies.popular.{$page}", fn () =>
            $this->get('/movie/popular', ['page' => $page])
        );
    }

    public function getTrendingMovies(): array
    {
        return $this->cached('movies.trending', fn () =>
            $this->get('/trending/movie/week')
        );
    }

    public function getMoviesByGenre(int $genreId, int $page = 1): array
    {
        return $this->cached("movies.genre.{$genreId}.{$page}", fn () =>
            $this->get('/discover/movie', ['with_genres' => $genreId, 'page' => $page, 'sort_by' => 'popularity.desc'])
        );
    }

    public function getMovieDetail(int $id): array
    {
        return $this->cached("movie.{$id}", fn () =>
            $this->get("/movie/{$id}", ['append_to_response' => 'credits,videos'])
        );
    }

    // ──────────────────────────────────────────
    //  Series (TV)
    // ──────────────────────────────────────────

    public function getPopularSeries(int $page = 1): array
    {
        return $this->cached("series.popular.{$page}", fn () =>
            $this->get('/tv/popular', ['page' => $page])
        );
    }

    public function getTrendingSeries(): array
    {
        return $this->cached('series.trending', fn () =>
            $this->get('/trending/tv/week')
        );
    }

    public function getSeriesByGenre(int $genreId, int $page = 1): array
    {
        return $this->cached("series.genre.{$genreId}.{$page}", fn () =>
            $this->get('/discover/tv', ['with_genres' => $genreId, 'page' => $page, 'sort_by' => 'popularity.desc'])
        );
    }

    public function getSeriesDetail(int $id): array
    {
        return $this->cached("series.{$id}", fn () =>
            $this->get("/tv/{$id}", ['append_to_response' => 'credits,videos'])
        );
    }

    // ──────────────────────────────────────────
    //  Genres
    // ──────────────────────────────────────────

    public function getMovieGenres(): array
    {
        return $this->cached('genres.movies', fn () =>
            $this->get('/genre/movie/list')['genres'] ?? []
        );
    }

    public function getTvGenres(): array
    {
        return $this->cached('genres.tv', fn () =>
            $this->get('/genre/tv/list')['genres'] ?? []
        );
    }

    // ──────────────────────────────────────────
    //  Image helpers
    // ──────────────────────────────────────────

    public function posterUrl(?string $path, string $size = 'w500'): string
    {
        if (! $path) {
            return 'https://via.placeholder.com/500x750/0F172A/FF2D20?text=TV+FlexDan';
        }

        return "{$this->imageBaseUrl}/{$size}{$path}";
    }

    public function backdropUrl(?string $path, string $size = 'w1280'): string
    {
        if (! $path) {
            return 'https://via.placeholder.com/1280x720/0F172A/FF2D20?text=TV+FlexDan';
        }

        return "{$this->imageBaseUrl}/{$size}{$path}";
    }

    // ──────────────────────────────────────────
    //  HTTP + Cache
    // ──────────────────────────────────────────

    private function get(string $endpoint, array $params = []): array
    {
        $response = Http::get($this->baseUrl . $endpoint, array_merge([
            'api_key'  => $this->apiKey,
            'language' => 'es-AR',
        ], $params));

        if ($response->failed()) {
            return [];
        }

        return $response->json() ?? [];
    }

    private function cached(string $key, callable $callback): array
    {
        return Cache::remember("tmdb.{$key}", $this->cacheTtl, $callback) ?? [];
    }
}
