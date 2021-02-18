<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\lis\Role;
use IMSGlobal\Caliper\entities\lis\Status;
use IMSGlobal\Caliper\entities\lis\Membership;
use IMSGlobal\Caliper\entities\lis\CourseOffering;
use IMSGlobal\Caliper\entities\agent\Person;

class EnvelopeTermLISStatusTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();

        $statuses = array(
            new Status(Status::ACTIVE),
            new Status(Status::INACTIVE)
        );

        $data = array();
        foreach ($statuses as $status) {
            $data[]= ( Membership::makeAnonymous() )
                ->setMember( Person::makeAnonymous()->makeReference() )
                ->setOrganization( CourseOffering::makeAnonymous()->makeReference() )
                ->setRoles( new Role(Role::ADMINISTRATOR) )
                ->setStatus( $status );
        }

        $this->setTestObject((new \IMSGlobal\Caliper\request\Envelope())
            ->setSensorId(new \IMSGlobal\Caliper\Sensor('https://example.edu/sensors/1'))
            ->setSendTime(new \DateTime('2020-01-22T10:05:00.000Z'))
            ->setData($data)
        );
    }
}
