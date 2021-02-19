<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\SoftwareApplication;
use IMSGlobal\Caliper\entities\SystemIdentifier;
use IMSGlobal\Caliper\entities\SystemIdentifierType;

/**
 * @requires PHP 5.6.28
 */
class EntitySystemIdentifier_MalformedIdentifierNotAnIntTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\SystemIdentifier::setIdentifier: string expected');

        (new SystemIdentifier(554433, new SystemIdentifierType(SystemIdentifierType::LTI_USERID)))
            ->setSource( (new SoftwareApplication('https://example.edu')) );
    }
}