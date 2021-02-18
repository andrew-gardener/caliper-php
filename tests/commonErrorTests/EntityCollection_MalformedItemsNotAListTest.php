<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\Collection;

/**
 * @requires PHP 5.6.28
 */
class EntityCollection_MalformedItemsNotAListTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\Collection::setItems: array of Entity expected');

        (new Collection('https://example.edu/terms/201601/courses/7/sections/1/resources/2'))
            ->setItems('This is not a list.')
            ->setDateCreated(new \DateTime('2019-08-01T06:00:00.000Z'))
            ->setDateModified(new \DateTime('2019-09-02T11:30:00.000Z'));
    }
}
