<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\scale\MultiselectScale;

/**
 * @requires PHP 5.6.28
 */
class EntityMultiselectScale_MalformedIsOrderedSelectionNotAnIntTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\scale\MultiselectScale::setIsOrderedSelection: bool expected');

        (new MultiselectScale('https://example.edu/scale/3'))
            ->setScalePoints(5)
            ->setItemLabels(['😁', '😀', '😐', '😕', '😞'])
            ->setItemValues(['superhappy', 'happy', 'indifferent', 'unhappy', 'disappointed'])
            ->setIsOrderedSelection(4)
            ->setMinSelections(1)
            ->setMaxSelections(5)
            ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z'));
    }
}
