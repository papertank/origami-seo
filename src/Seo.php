<?php namespace Origami\Seo;

use Illuminate\Support\Str;

class Seo {

    /**
     * @var array
     */
    private $config;

    public function __construct($config = array())
    {
        $this->config = $config;
    }

    public function title($prefix = null)
    {
        if ( ! $prefix ) {
            return $this->config('title.default');
        }

        $suffix = $this->config('title.suffix');
        $separator = $this->config('title.separator');

        if ( is_array($prefix) ) {
            $prefix = implode($this->config('title.glue', $separator), $prefix);
        }

        $prefix .= $separator;

        return $prefix . $suffix;
    }

    public function description($text = null)
    {
        if ( ! $text ) {
            $text = $this->config('description.default');
        }

        $limit = $this->config('description.limit', false);

        return ( $limit ? str_limit($text, $limit) : $text );
    }

    public function config($key, $fallback = null)
    {
        return array_get($this->config, $key, $fallback);
    }

}