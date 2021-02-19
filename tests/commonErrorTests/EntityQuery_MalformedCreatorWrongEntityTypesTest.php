<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\search\Query;
use IMSGlobal\Caliper\entities\agent\SoftwareApplication;

/**
 * @requires PHP 5.6.28
 */
class EntityQuery_MalformedCreatorWrongEntityTypesTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(TypeError::class);
        // skipping error message since it includes file path
        // $this->expectExceptionMessage('');

        (new Query('https://example.edu/users/554433/search?query=IMS%20AND%20%28Caliper%20OR%20Analytics%29'))
            ->setCreator(
                (new SoftwareApplication('https://example.edu/catalog'))
            )
            ->setSearchTarget(
                (new SoftwareApplication('https://example.edu/catalog'))
            )
            ->setSearchTerms('IMS AND (Caliper OR Analytics)')
            ->setDateCreated(
                new \DateTime('2018-11-15T10:05:00.000Z'));
    }
}
