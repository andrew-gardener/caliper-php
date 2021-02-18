<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\link\LtiLink;
use IMSGlobal\Caliper\entities\LTIMessageType;

/**
 * @requires PHP 5.6.28
 */
class EntityLtiLinkTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();


        $this->setTestObject(
            (new LtiLink('https://tool.com/link/123'))
                ->setMessageType( new LTIMessageType(LTIMessageType::LTI_RESOURCE_LINK_REQUEST) )
        );
    }
}
