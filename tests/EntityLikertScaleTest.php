<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\scale\LikertScale;


/**
 * @requires PHP 7.3
 */
class EntityLikertScaleTest extends CaliperTestCase {
    function setUp() : void {
        parent::setUp();

        $this->setTestObject(
            (new LikertScale('https://example.edu/scale/2'))
                ->setScalePoints(4)
                ->setItemLabels(['Strongly Disagree', 'Disagree', 'Agree', 'Strongly Agree'])
                ->setItemValues(['-2', '-1', '1', '2'])
        );
    }
}
