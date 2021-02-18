<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\SoftwareApplication;

/**
 * @requires PHP 5.6.28
 */
class EntitySoftwareApplication_MalformedIpAddressNotAnIntTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\agent\SoftwareApplication::setIpAddress: string expected');

        (new SoftwareApplication('urn:uuid:d71016dc-ed2f-46f9-ac2c-b93f15f38fdc'))
            ->setHost('https://example.edu')
            ->setUserAgent('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36')
            ->setIpAddress(1.2);
    }
}