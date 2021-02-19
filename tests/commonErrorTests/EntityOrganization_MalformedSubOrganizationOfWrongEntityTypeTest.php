<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Organization;
use IMSGlobal\Caliper\entities\agent\Person;

/**
 * @requires PHP 5.6.28
 */
class EntityOrganization_MalformedSubOrganizationOfWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(TypeError::class);
        // skipping error message since it includes file path
        // $this->expectExceptionMessage('');

        (new Organization('https://example.edu/colleges/1/depts/1'))
            ->setName('Computer Science Department')
            ->setSubOrganizationOf(
                (new Organization('https://example.edu/colleges/1'))
                    ->setName('College of Engineering')
            )
            ->setSubOrganizationOf(
                (new Person('https://example.edu/users/223344'))
            )
            ->setMembers(
                [
                    (new Person('https://example.edu/users/223344'))
                ]
            );
    }
}
