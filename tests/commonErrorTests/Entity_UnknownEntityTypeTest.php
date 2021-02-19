<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\SoftwareApplication;
use IMSGlobal\Caliper\entities\SystemIdentifier;
use IMSGlobal\Caliper\entities\SystemIdentifierType;
use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\EntityType;

/**
 * @requires PHP 5.6.28
 */
class Entity_UnknownEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(TypeError::class);
        // skipping error message since it includes file path
        // $this->expectExceptionMessage('');

        (new Person('https://example.edu/users/554433'))
            ->setType('NotACailperEntityType')
            ->setOtherIdentifiers([
                (new Person('https://example.edu/users/998877')),
                (new SystemIdentifier('example.edu:71ee7e42-f6d2-414a-80db-b69ac2defd4', new SystemIdentifierType(SystemIdentifierType::LIS_SOURCED_ID))),
                (new SystemIdentifier('https://example.edu/users/554433', new SystemIdentifierType(SystemIdentifierType::LTI_USERID)))
                    ->setSource( (new SoftwareApplication('https://example.edu')) ),
                (new SystemIdentifier('jane@example.edu', new SystemIdentifierType(SystemIdentifierType::EMAIL_ADDRESS)))
                    ->setSource( (new SoftwareApplication('https://example.edu'))->makeReference() ),
            ])
            ->setDateCreated(
                new \DateTime('2016-08-01T06:00:00.000Z'))
            ->setDateModified(
                new \DateTime('2016-09-02T11:30:00.000Z'));
    }

    function testError2() {
        $this->expectException(InvalidArgumentException::class);
        // skipping error message since it includes all the entity types (very long)
        // $this->expectExceptionMessage('');

        (new Person('https://example.edu/users/554433'))
            ->setType(new EntityType('NotACailperEntityType'))
            ->setOtherIdentifiers([
                (new Person('https://example.edu/users/998877')),
                (new SystemIdentifier('example.edu:71ee7e42-f6d2-414a-80db-b69ac2defd4', new SystemIdentifierType(SystemIdentifierType::LIS_SOURCED_ID))),
                (new SystemIdentifier('https://example.edu/users/554433', new SystemIdentifierType(SystemIdentifierType::LTI_USERID)))
                    ->setSource( (new SoftwareApplication('https://example.edu')) ),
                (new SystemIdentifier('jane@example.edu', new SystemIdentifierType(SystemIdentifierType::EMAIL_ADDRESS)))
                    ->setSource( (new SoftwareApplication('https://example.edu'))->makeReference() ),
            ])
            ->setDateCreated(
                new \DateTime('2016-08-01T06:00:00.000Z'))
            ->setDateModified(
                new \DateTime('2016-09-02T11:30:00.000Z'));
    }
}
