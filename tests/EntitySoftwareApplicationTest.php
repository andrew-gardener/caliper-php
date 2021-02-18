<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\agent\SoftwareApplication;


/**
 * @requires PHP 7.3
 */
class EntitySoftwareApplicationTest extends CaliperTestCase {
    function setUp() : void {
        parent::setUp();


        $this->setTestObject(
            (new SoftwareApplication('https://example.edu/autograder'))
                ->setName(
                    'Auto Grader'
                )
                ->setDescription(
                    'Automates assignment scoring.'
                )
                ->setVersion(
                    '2.5.2'
                )
        );
    }
}
