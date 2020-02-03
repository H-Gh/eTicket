<?php


namespace App\Services;


class DirectionService
{
    /**
     * @return bool
     */
    public function isRtl()
    {
        return (in_array(app()->getLocale(), ["fa", "ar", "az", "mv", "he", "ku", "ur"]));
    }
}
