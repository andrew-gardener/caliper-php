<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\Forum;
use IMSGlobal\Caliper\entities\Message;
use IMSGlobal\Caliper\entities\Thread;

/**
 * @requires PHP 5.6.28
 */
class EntityMessage_MalformedAttachmentsNotAListTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\Message::setAttachments: array of DigitalResource expected');

        (new Message('https://example.edu/terms/201601/courses/7/sections/1/forums/2/topics/1/messages/3'))
            ->setCreators(
                [
                    (new Person('https://example.edu/users/778899')),
                ]
            )
            ->setBody('The Caliper working group provides a set of Caliper Sensor reference implementations for the purposes of education and experimentation.  They have not been tested for use in a production environment.  See the Caliper Implementation Guide for more details.')
            ->setReplyTo(
                (new Message('https://example.edu/terms/201601/courses/7/sections/1/forums/2/topics/1/messages/2'))
            )
            ->setIsPartOf(
                (new Thread('https://example.edu/terms/201601/courses/7/sections/1/forums/2/topics/1'))
                    ->setIsPartOf(
                        (new Forum('https://example.edu/terms/201601/courses/7/sections/1/forums/2'))
                    )
            )
            ->setAttachments('This is not a list')
            ->setDateCreated(new \DateTime('2016-11-15T10:15:30.000Z'));
    }
}
