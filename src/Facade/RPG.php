<?php

namespace TechTailor\RPG\Facade;

use Illuminate\Support\Facades\Facade;

class RPG extends Facade
{
    /**
     * Get the binding in the IoC container.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rpg'; // the IoC binding.
    }
}
