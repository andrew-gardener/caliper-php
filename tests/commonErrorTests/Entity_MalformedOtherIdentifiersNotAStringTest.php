<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\SystemIdentifier;
use IMSGlobal\Caliper\entities\agent\Person;

/**
 * @requires PHP 5.6.28
 */
class Entity_MalformedOtherIdentifiersNotAStringTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\Entity::setOtherIdentifiers: array of SystemIdentifier expected');

        (new Person('https://example.edu/users/554433'))
            ->setOtherIdentifiers('Not a list of other identifiers')
            ->setDateCreated(
                new \DateTime('2016-08-01T06:00:00.000Z'))
            ->setDateModified(
                new \DateTime('2016-09-02T11:30:00.000Z'));
    }
}
