<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\annotation\SharedAnnotation;
use IMSGlobal\Caliper\entities\reading\Document;

/**
 * @requires PHP 5.6.28
 */
class EntitySharedAnnotation_MalformedWithAgentsNotAListTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\annotation\SharedAnnotation::setWithAgents: array of Agent expected');

        (new SharedAnnotation('https://example.edu/users/554433/etexts/201/shares/1'))
            ->setAnnotator(
                (new Person('https://example.edu/users/554433'))
            )
            ->setAnnotated(
                (new Document('https://example.edu/etexts/201.epub'))
            )
            ->setWithAgents('This is not a list')
            ->setDateCreated(new \DateTime('2016-08-01T09:00:00.000Z'));
    }
}