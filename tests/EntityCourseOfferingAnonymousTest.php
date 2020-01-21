<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\lis\CourseOffering;


/**
 * @requires PHP 5.6.28
 */
class EntityCourseOfferingAnonymousTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();


        $this->setTestObject(
            CourseOffering::makeAnonymous()
        );
    }
}
