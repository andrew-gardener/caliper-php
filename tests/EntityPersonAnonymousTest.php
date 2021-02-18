<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\agent\Person;

/**
 * @requires PHP 7.3
 */
class EntityPersonAnonymousTest extends CaliperTestCase {
    function setUp() : void {
        parent::setUp();


        $this->setTestObject(
            Person::makeAnonymous()
        );
    }
}
