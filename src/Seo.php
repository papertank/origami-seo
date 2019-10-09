<?php

namespace Origami\Seo;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Seo
{
    /**
     * @var array
     */
    private $config;

    public function __construct($config = [])
    {
        $this->config = $config;
    }

    public function title($prefix = null)
    {
        if (!$prefix) {
            return $this->config('title.default');
        }

        $suffix = $this->config('title.suffix');
        $separator = $this->config('title.separator');

        if (is_array($prefix)) {
            $prefix = implode($this->config('title.glue', $separator), $prefix);
        }

        $prefix .= $separator;

        return $prefix . $suffix;
    }

    public function description($text = null)
    {
        if (!$text) {
            $text = $this->config('description.default');
        }

        $limit = $this->config('description.limit', false);

        return ($limit ? Str::limit($text, $limit) : $text);
    }

    public function config($key, $fallback = null)
    {
        return Arr::get($this->config, $key, $fallback);
    }
}
