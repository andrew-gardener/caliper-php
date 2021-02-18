<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\link\Link;

/**
 * @requires PHP 7.3
 */
class EntityLinkTest extends CaliperTestCase {
    function setUp() : void {
        parent::setUp();


        $this->setTestObject(
            (new Link('https://example.edu/terms/201801/courses/7/sections/1/pages/1'))
        );
    }
}
