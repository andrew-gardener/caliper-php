<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\annotation\TextPositionSelector;


/**
 * @requires PHP 7.3
 */
class EntityTextPositionSelectorTest extends CaliperTestCase {
    function setUp() : void {
        parent::setUp();


        $this->setTestObject(
            (new TextPositionSelector())
                ->setStart(2300)
                ->setEnd(2370)
        );
    }
}
