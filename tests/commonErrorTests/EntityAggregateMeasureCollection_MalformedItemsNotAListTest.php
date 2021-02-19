<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\measure\AggregateMeasureCollection;
use IMSGlobal\Caliper\entities\measure\AggregateMeasure;

/**
 * @requires PHP 5.6.28
 */
class EntityAggregateMeasureCollection_MalformedItemsNotAListTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\measure\AggregateMeasureCollection::setItems: array of AggregateMeasure expected');

        (new AggregateMeasureCollection('urn:uuid:60b4db01-f1e5-4a7f-add9-6a8f761625b1'))
            ->setItems('Not an aggregate measure object');
    }
}
