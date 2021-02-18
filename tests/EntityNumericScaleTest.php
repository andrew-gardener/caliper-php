<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\scale\NumericScale;


/**
 * @requires PHP 7.3
 */
class EntityNumericScaleTest extends CaliperTestCase {
    function setUp() : void {
        parent::setUp();

        $this->setTestObject(
            (new NumericScale('https://example.edu/scale/4'))
                ->setMinValue(0.0)
                ->setMinLabel('Disliked')
                ->setMaxValue(10.0)
                ->setMaxLabel('Liked')
                ->setStep(0.5)
                ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z'))
        );
    }
}

