<?php

class ThemeHouse_RandomKeyGen_Listener_LoadClass extends ThemeHouse_Listener_LoadClass
{
    protected function _getExtendedClasses()
    {
        return array(
            'ThemeHouse_RandomKeyGen' => array(
                'controller' => array(
                    'XenForo_ControllerPublic_Misc',
                ), /* END 'controller' */
            ), /* END 'ThemeHouse_RandomKeyGen' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassController($class, array &$extend)
    {
        $loadClassController = new ThemeHouse_RandomKeyGen_Listener_LoadClass($class, $extend, 'controller');
        $extend = $loadClassController->run();
    } /* END loadClassController */
}