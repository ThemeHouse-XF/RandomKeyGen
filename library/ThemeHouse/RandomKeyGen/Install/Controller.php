<?php

class ThemeHouse_RandomKeyGen_Install_Controller extends ThemeHouse_Install
{

    protected $_resourceManagerUrl = 'http://xenforo.com/community/resources/random-key-generator-by-th.2145/';

    /**
     *
     * @see ThemeHouse_Install::_getTableChanges()
     */
    protected function _getTableChanges()
    {
        return array(
            'xf_user' => array(
                'gen_key' => 'VARCHAR(10) NOT NULL DEFAULT \'0\'', /* END 'gen_key' */
            ), /* END 'xf_user' */
        );
    } /* END _getTableChanges */
}