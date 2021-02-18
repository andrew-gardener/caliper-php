<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\link\LtiLink;
use IMSGlobal\Caliper\entities\LTIMessageType;

/**
 * @requires PHP 5.6.28
 */
class EntityLtiLink_MalformedMessageTypeUnknownValueTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\link\LtiLink::setMessageType: LTIMessageType expected');

        (new LtiLink('https://tool.com/link/123'))
            ->setMessageType('NotAValidMessageType');
    }

    function testError2() {
        $this->expectException(InvalidArgumentException::class);
        // skipping error message since it includes all the entity types (very long)
        // $this->expectExceptionMessage('');

        (new LtiLink('https://tool.com/link/123'))
            ->setMessageType( new LTIMessageType('NotAValidMessageType') );
    }
}
