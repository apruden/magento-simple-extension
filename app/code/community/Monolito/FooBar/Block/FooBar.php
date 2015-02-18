<?php

/**
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 *
 *
 * This block name is foobar/helloWorld, as per the module config.xml file
 * under session global.blocks.<i>foobar</i>.class
 *
 * In order to override the rendering of this class, the protected method
 * _toHtml() should be overriden.
 */
class Monolito_FooBar_Block extends Mage_Core_Block_Template
{

    /**
     * @var string
     */
    protected $_name = 'World';

    public function getName()
    {
        return $this->_name;
    }

}
