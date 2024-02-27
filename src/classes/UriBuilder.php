<?php

namespace Src\classes;

use Src\traits\HasFilters;

class UriBuilder
{
    use HasFilters;

    public $uri;

    /**
     * @param $term
     * @param $page
     * @param $limit
     * @param $order
     * @param $local
     * @return $this Get a list of resources paginated by different filters
     */
    public function resources($page = 1, $term = null, $limit = null, $order = null, $local = null)
    {
        $this->uri = 'https://api.freepik.com/v1/resources?page=' . $page;
        if (!$local == null) {
            $this->uri .= '&locale=' . $local;
        }
        if (!$limit == null) {
            $this->uri .= '&limit=' . $limit;
        }
        if (!$term == null) {
            $this->uri .= '&term=' . $term;
        }
        if (!$order == null) {
            $this->uri .= '&order=' . $order;
        }
        return $this;
    }

    public function resourceDetail($id)
    {
        $this->uri = 'https://api.freepik.com/v1/resources/' . $id;
        return $this;
    }

    public function resourceDownload($id)
    {
        $this->uri = 'https://api.freepik.com/v1/resources/' . $id . '/download';
        return $this;
    }

    public function resourceDownloadByFormat($id, $format)
    {
        $this->uri = 'https://api.freepik.com/v1/resources/' . $id . '/download/' . $format;
        return $this;
    }

    public function plan()
    {
        $this->uri = 'https://api.freepik.com/v1/developers/email@freepik.com/plan';
        return $this;
    }

    public function planUsage()
    {
        $this->uri = 'https://api.freepik.com/v1/developers/email@freepik.com/plan-usage';
        return $this;
    }

    public function icons($term, $slug = null, $page = null, $family_id = null, $order = null, $thumbnail_size = null)
    {
        $this->uri = 'https://api.freepik.com/v1/icons?term=' . $term;
        if (!$slug == null) {
            $this->uri .= '&slug=' . $slug;
        }
        if (!$page == null) {
            $this->uri .= '&page=' . $page;
        }
        if (!$family_id == null) {
            $this->uri .= '&family-id=' . $family_id;
        }
        if (!$order == null) {
            $this->uri .= '&order=' . $order;
        }
        if (!$thumbnail_size == null) {
            $this->uri .= '&thumbnail_size=' . $thumbnail_size;
        }
        return $this;
    }

    public function iconDetail($id)
    {
        $this->uri = 'https://api.freepik.com/v1/icons/' . $id;
        return $this;
    }

    public function iconDownload($id)
    {
        $this->uri = 'https://api.freepik.com/v1/icons/' . $id . '/download';
        return $this;
    }

}