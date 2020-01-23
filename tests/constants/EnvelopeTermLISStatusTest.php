<?php
require_once __DIR__ . '/../CaliperTestCase.php';

use IMSGlobal\Caliper\entities\lis\Status;
use IMSGlobal\Caliper\entities\lis\Membership;

class EnvelopeTermLISStatusTest extends CaliperTestCase {
    function setUp() {
        $this->setFixtureRelativeSubDirectoryPath('/constantsFixtures');
        parent::setUp();

        $statuses = array(
            new Status(Status::ACTIVE),
            new Status(Status::INACTIVE)
        );

        $data = array();
        foreach ($statuses as $status) {
            $data[]= ( Membership::makeAnonymous() )
                ->setStatus( $status );
        }

        $this->setTestObject((new \IMSGlobal\Caliper\request\Envelope())
            ->setSensorId(new \IMSGlobal\Caliper\Sensor('https://example.edu/sensors/1'))
            ->setSendTime(new \DateTime('2020-01-22T10:05:00.000Z'))
            ->setData($data)
        );
    }
}
