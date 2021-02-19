<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Organization;

/**
 * @requires PHP 5.6.28
 */
class EntityOrganization_MalformedMembersNotAListTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\agent\Organization::setMembers: array of Agent expected');

        (new Organization('https://example.edu/colleges/1/depts/1'))
            ->setName('Computer Science Department')
            ->setSubOrganizationOf(
                (new Organization('https://example.edu/colleges/1'))
                    ->setName('College of Engineering')
            )
            ->setMembers('This is not a list.');
    }
}
