<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\SoftwareApplication;

/**
 * @requires PHP 5.6.28
 */
class EntitySoftwareApplication_MalformedUserAgentNotAnIntTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\agent\SoftwareApplication::setUserAgent: string expected');

        (new SoftwareApplication('urn:uuid:d71016dc-ed2f-46f9-ac2c-b93f15f38fdc'))
            ->setHost('https://example.edu')
            ->setUserAgent(1)
            ->setIpAddress('2001:0db8:85a3:0000:0000:8a2e:0370:7334');
    }
}