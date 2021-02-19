<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\scale\MultiselectScale;

/**
 * @requires PHP 5.6.28
 */
class EntityMultiselectScale_MalformedItemValuesNotAListTest extends CaliperErrorTestCase {
    function testError() {
        $this->markTestSkipped('Since non-arrays are automatically converted to arrays');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('');

        (new MultiselectScale('https://example.edu/scale/3'))
            ->setScalePoints(5)
            ->setItemLabels(['😁', '😀', '😐', '😕', '😞'])
            ->setItemValues('This is not a list')
            ->setIsOrderedSelection(false)
            ->setMinSelections(1)
            ->setMaxSelections(5)
            ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z'));
    }
}
