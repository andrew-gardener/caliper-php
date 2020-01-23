<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\agent\Person;

/**
 * @requires PHP 5.6.28
 */
class EntityPersonAnonymousTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();


        $this->setTestObject(
            Person::makeAnonymous()
        );
    }
}
