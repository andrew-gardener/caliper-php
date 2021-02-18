<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\SystemIdentifier;
use IMSGlobal\Caliper\entities\SystemIdentifierType;

/**
 * @requires PHP 5.6.28
 */
class EntitySystemIdentifier_MalformedSourceWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(TypeError::class);
        // skipping error message since it includes file path
        // $this->expectExceptionMessage('');

        (new SystemIdentifier('https://example.edu/users/554433', new SystemIdentifierType(SystemIdentifierType::LTI_USERID)))
            ->setSource( (new Person('https://example.edu/users/554433')) );
    }
}