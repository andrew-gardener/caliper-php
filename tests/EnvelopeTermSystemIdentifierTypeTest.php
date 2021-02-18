<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\Entity;
use IMSGlobal\Caliper\entities\SystemIdentifier;
use IMSGlobal\Caliper\entities\SystemIdentifierType;

class EnvelopeTermSystemIdentifierTypeTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();

        $system_identifiers = array(
            new SystemIdentifier('root',  new SystemIdentifierType(SystemIdentifierType::ACCOUNT_USERNAME)),
            new SystemIdentifier('https://salt-demo.edplancms.com/ims/case/v1p0/CFItems/04bc8e7e-36d3-4078-bed5-e33e9de98d5c',  new SystemIdentifierType(SystemIdentifierType::CASE_ITEM_URI)),
            new SystemIdentifier('jane@example.edu', new SystemIdentifierType(SystemIdentifierType::EMAIL_ADDRESS)),
            new SystemIdentifier('example.edu:SI182-F16', new SystemIdentifierType(SystemIdentifierType::LIS_SOURCED_ID)),
            new SystemIdentifier('example.edu:CI182-S16', new SystemIdentifierType(SystemIdentifierType::LTI_CONTEXT_ID)),
            new SystemIdentifier('deployment_id_1', new SystemIdentifierType(SystemIdentifierType::LTI_DEPLOYMENT_ID)),
            new SystemIdentifier('platform_id_1', new SystemIdentifierType(SystemIdentifierType::LTI_PLATFORM_ID)),
            new SystemIdentifier('tool_id_1', new SystemIdentifierType(SystemIdentifierType::LTI_TOOL_ID)),
            new SystemIdentifier('user_id_1', new SystemIdentifierType(SystemIdentifierType::LTI_USERID)),
            new SystemIdentifier('one_roster_id_1', new SystemIdentifierType(SystemIdentifierType::ONEROSTER_SOURCED_ID)),
            new SystemIdentifier('other_1', new SystemIdentifierType(SystemIdentifierType::OTHER)),
            new SystemIdentifier('sis_sourcedid_1', new SystemIdentifierType(SystemIdentifierType::SIS_SOURCEDID)),
            new SystemIdentifier('system_id_1', new SystemIdentifierType(SystemIdentifierType::SYSTEM_ID))
        );

        $data = array();
        foreach ($system_identifiers as $system_identifier) {
            $data[]= ( Entity::makeAnonymous() )
                ->setOtherIdentifiers( [$system_identifier] );
        }

        $this->setTestObject((new \IMSGlobal\Caliper\request\Envelope())
            ->setSensorId(new \IMSGlobal\Caliper\Sensor('https://example.edu/sensors/1'))
            ->setSendTime(new \DateTime('2020-01-22T10:05:00.000Z'))
            ->setData($data)
        );
    }
}
