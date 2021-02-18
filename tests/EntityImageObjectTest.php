<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\media\ImageObject;


/**
 * @requires PHP 7.3
 */
class EntityImageObjectTest extends CaliperTestCase {
    function setUp() : void {
        parent::setUp();


        $this->setTestObject(
            (new ImageObject('https://example.edu/images/caliper_lti.jpg'))
                ->setName(
                    'IMS Caliper/LTI Integration Work Flow'
                )
                ->setMediaType(
                    'image/jpeg'
                )
                ->setDateCreated(
                    new \DateTime('2016-09-01T06:00:00.000Z'))
        );
    }
}
