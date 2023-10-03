<?php

namespace App\Controllers;

use App\Models\Api;

class Home extends BaseController
{
    private $api;
    public function __construct()
    {
        $this->api = new Api();
    }
    public function index(): string
    {
        $query = $this->request->getVar('search');
        if (isset($query)) {
            $url = env("MOVIE_BASE_URL") . "/search/movie?query=" . $query . "&page=1&api_key=" . env("MOVIE_API_KEY");
        }

        if (empty($query)) {
            $url = env("MOVIE_BASE_URL") . "/movie/popular?language=en-US&page=1&api_key=" . env("MOVIE_API_KEY");
        }

        $data = $this->api->getData($url);

        $data = [
            'title' => 'Home',
            'data' => $data['results'],
            'base_url' => 'https://image.tmdb.org/t/p/w300/'
        ];
        return view('Home', $data);
    }

    function myMovie()
    {
        $url = env("MOVIE_BASE_URL") . "/account/19102617/favorite/movies?language=en-US&page=1&sort_by=created_at.asc";
        $headers = [
            'Authorization' => "Bearer " . env("MOVIE_TOKEN"),
            'accept' => 'application/json',
        ];

        $data = $this->api->getData($url, $headers);

        $data = [
            'title' => 'My Movie',
            'data' => $data['results'] ?? [],
            'base_url' => 'https://image.tmdb.org/t/p/w300/'
        ];
        return view('MyMovie', $data);
    }
}
