<?php

namespace Src;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use JetBrains\PhpStorm\ExpectedValues;
use Src\classes\UriBuilder;

/**
 *
 */
class FreepikAPi extends UriBuilder
{
    protected $api;
    protected $client;
    protected $headers =
        [
            'Accept-Language' => 'en-US',
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-Freepik-API-Key' => null
        ];
    protected $request;
    protected $all;

    public function __construct($api)
    {
        $this->client = new Client();
        $this->headers['X-Freepik-API-Key'] = $api;
        $this->api = $api;
    }

    public function request()
    {
        $this->request = new Request('GET', $this->uri, $this->headers);
        $this->all = json_decode($this->client->sendAsync($this->request)->wait()->getBody());
        return $this;
    }

    public function result()
    {
        $json = json_encode($this->all, JSON_PRETTY_PRINT);
        echo '<pre>';
        print_r($json);
        echo '</pre>';

    }


    public function showResources()
    {
        foreach ($this->all->data as $key => $image) {
            if ($key === count($this->all->data)) {
                break;
            }
            echo '<img src=' . $this->all->data[$key]->image->source->url . '>';
        }
    }

    public function getResource($location)
    {
        if (substr($location, -1) !== '/') {
            $location .= '/';
        }
        $filename = $this->all->data->filename;
        $url = $this->all->data->url;
        $localFilePath = $location . $filename;
        file_put_contents($localFilePath, file_get_contents($url));
        echo 'complete';
    }

    public function getResourceByFormat($location)
    {
        if (substr($location, -1) !== '/') {
            $location .= '/';
        }
        $filename = $this->all->data[0]->filename;
        $url = $this->all->data[0]->url;
        $localFilePath = $location . $filename;
        file_put_contents($localFilePath, file_get_contents($url));
        echo 'complete';
    }

    public function showIcons()
    {
        foreach ($this->all->data as $key => $image) {
            if ($key === count($this->all->data)) {
                break;
            }
            echo '<img src=' . $this->all->data[$key]->thumbnails[0]->url . '>';
        }
    }

    public function getIcon($location)
    {
        if (substr($location, -1) !== '/') {
            $location .= '/';
        }
        $url = $this->all->data->url;
        $queryString = parse_url($url, PHP_URL_QUERY);
        parse_str($queryString, $params);
        $filename = $params['filename'];
        $localFilePath = $location . $filename;
        file_put_contents($localFilePath, file_get_contents($url));
        echo 'complete';
    }

}