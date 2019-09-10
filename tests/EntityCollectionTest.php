<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\Collection;
use IMSGlobal\Caliper\entities\Entity;

/**
 * @requires PHP 5.6.28
 */
class EntityCollectionTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();

        $this->setTestObject(
            (new Collection('urn:uuid:9e5987b9-31db-48bf-8dfb-4f6055a8c5db'))
                ->setItems(
                    [
                        (new Entity('urn:uuid:81e6326d-e57e-43b8-a949-e8a835b4462a')),
                        (new Entity('urn:uuid:f83086d9-d046-4464-8fbe-c8e4f9e8d7e2'))
                    ]
                )
        );
    }
}
