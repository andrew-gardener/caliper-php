<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\assignable\AssignableDigitalResource;
use IMSGlobal\Caliper\entities\LearningObjective;


/**
 * @requires PHP 7.3
 */
class EntityLearningObjectiveTest extends CaliperTestCase {
    function setUp() : void {
        parent::setUp();


        $this->setTestObject(
            (new LearningObjective('https://example.edu/terms/201601/courses/7/sections/1/objectives/1'))
                ->setName(
                    'Research techniques'
                )
                ->setDescription(
                    'Demonstrate ability to model a learning activity as a Caliper profile.'
                )
                ->setDateCreated(
                    new \DateTime('2016-08-01T06:00:00.000Z'))
        );
    }
}
