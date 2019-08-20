<?php
/**
 * Created by PhpStorm.
 * User: glesp
 * Date: 12/01/2017
 * Time: 15:38.
 */

namespace FrontBundle\Traits;

trait UcFirstUtf8
{
    public function ucfirstUtf8($string = null)
    {
        if (null == $string) {
            return false;
        }
        $apresPremier = mb_substr($string, 1); //mb_substr : Effectue une opération de type substr() basée sur le nombre de caractères
        $string = trim($string);
        $maj = utf8_decode($string);
        $maj = $maj[0];
        $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ??';
        $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        $maj = strtr($maj, utf8_decode($a), $b);
        $string = substr_replace($string, $maj, 0);
        $string = utf8_encode($string);
        $string = ucfirst($string);
        $string = $string.$apresPremier;

        return $string;
    }
}
