<?php
require_once __DIR__ . '/../CaliperTestCase.php';

use IMSGlobal\Caliper\entities\link\LtiLink;
use IMSGlobal\Caliper\entities\LTIMessageType;

class EnvelopeTermLTIMessageTypeTest extends CaliperTestCase {
    function setUp() {
        $this->setFixtureRelativeSubDirectoryPath('/constantsFixtures');
        parent::setUp();

        $message_types = array(
            new LTIMessageType(LTIMessageType::LTI_DEEP_LINKING_REQUEST),
            new LTIMessageType(LTIMessageType::LTI_RESOURCE_LINK_REQUEST)
        );

        $data = array();
        foreach ($message_types as $message_type) {
            $data[]= ( LtiLink::makeAnonymous() )
                ->setMessageType( $message_type );
        }

        $this->setTestObject((new \IMSGlobal\Caliper\request\Envelope())
            ->setSensorId(new \IMSGlobal\Caliper\Sensor('https://example.edu/sensors/1'))
            ->setSendTime(new \DateTime('2020-01-22T10:05:00.000Z'))
            ->setData($data)
        );
    }
}
