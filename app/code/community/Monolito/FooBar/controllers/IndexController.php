<?php

/**
 * /:module/:controller/:action
 *
 * :module is what matches package/module/config.xml
 *         config.frontend.routers.{module}.args.frontName value,
 *         and in this case 'foobar'
 *
 * :controller defaults to index
 * :action defaults to index
 *
 */
class Monolito_FooBar_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * paths: /foobar/
     *        /foobar/index
     *        /foobar/index/index
     *
     * @return void
     */
    public function indexAction()
    {
        // Loads layouts inside app/design/frontend/base/default/layout or app/design/frontend/default/default/layout
        // depending on the selected theme.
        // The layout of this page is in the foobar.xml
        Mage::log("foobar index action");
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * path: /foobar/index/goodbye
     * @return void
     */
    public function goodByeAction()
    {
        $this->loadLayout()->renderLayout();
    }
}
