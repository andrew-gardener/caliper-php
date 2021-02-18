<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\lis\CourseOffering;


/**
 * @requires PHP 7.3
 */
class EntityCourseOfferingAnonymousTest extends CaliperTestCase {
    function setUp() : void {
        parent::setUp();


        $this->setTestObject(
            CourseOffering::makeAnonymous()
        );
    }
}
