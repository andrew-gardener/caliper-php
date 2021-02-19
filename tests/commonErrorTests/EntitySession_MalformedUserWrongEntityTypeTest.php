<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\SoftwareApplication;
use IMSGlobal\Caliper\entities\session\Session;

/**
 * @requires PHP 5.6.28
 */
class EntitySession_MalformedUserWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\session\Session::setUser: Person expected');

        (new Session('https://example.edu/sessions/1f6442a482de72ea6ad134943812bff564a76259'))
            ->setUser(
                (new SoftwareApplication('https://example.edu/autograder'))
                    ->setName('Auto Grader')
                    ->setDescription('Automates assignment scoring.')
                    ->setVersion('2.5.2')
            )
            ->setStartedAtTime(new \DateTime('2016-09-15T10:00:00.000Z'));
    }
}