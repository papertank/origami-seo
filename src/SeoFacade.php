<?php namespace Origami\Seo;

use Illuminate\Support\Facades\Facade;

class SeoFacade extends Facade
{
    /**
     * Get the registered component.
     *
     * @return object
     */
    protected static function getFacadeAccessor()
    {
        return 'origami.seo';
    }
}
