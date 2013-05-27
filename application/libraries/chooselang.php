<?php
class Chooselang extends HTML {
    /**
     * Generate a Language changer link.
     *
     * <code>
     *      // Generate a link to the current location,
     *      // but still change the site langauge on the fly
     *      // Change $langcode to desired language, also change the Config::set('application.language', 'YOUR-LANG-HERE')); to desired language
     *      // Example
     *      echo Chooselang::langslug(URI::current() , $langcode = 'Finnish' . Config::set('application.language', 'fi'));
     * </code>
     *
     * @param  string  $url
     * @param  string  $langcode
     * @param  array   $attributes
     * @param  bool    $https
     * @return string
     */

    public static function langslug($url, $langcode = null, $attributes = array(), $https = null)
    {
        $url = URL::to($url, $https);

        if (is_null($langcode)) $langcode = $url;

        return '<a href="'.$url.'"'.static::attributes($attributes).'>'.static::entities($langcode).'</a>';
    }

}