<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\SoftwareApplication;
use IMSGlobal\Caliper\entities\SystemIdentifier;
use IMSGlobal\Caliper\entities\SystemIdentifierType;

/**
 * @requires PHP 5.6.28
 */
class EntitySystemIdentifier_MalformedIdentifierTypeUnknownValueTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(TypeError::class);
        // skipping error message since it includes file path
        // $this->expectExceptionMessage('');

        (new SystemIdentifier('https://example.edu/users/554433', 'NotAKnownType'))
            ->setSource( (new SoftwareApplication('https://example.edu')) );
    }

    function testError2() {
        $this->expectException(InvalidArgumentException::class);
        // skipping error message since it includes all the system identifier types (very long)
        // $this->expectExceptionMessage('');

        (new SystemIdentifier('https://example.edu/users/554433', new SystemIdentifierType('NotAKnownType')))
            ->setSource( (new SoftwareApplication('https://example.edu')) );
    }
}