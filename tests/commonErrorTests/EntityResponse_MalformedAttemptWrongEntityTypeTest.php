<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\response\Response;

/**
 * @requires PHP 5.6.28
 */
class EntityResponse_MalformedAttemptWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(TypeError::class);
        // skipping error message since it includes file path
        // $this->expectExceptionMessage('');

        (new Response('https://example.edu/terms/201601/courses/7/sections/1/assess/1/items/6/users/554433/responses/1'))
            ->setAttempt(
                (new Person('https://example.edu/users/554433'))
            )
            ->setDateCreated(
                new \DateTime('2016-11-15T10:15:46.000Z'))
            ->setStartedAtTime(
                new \DateTime('2016-11-15T10:15:46.000Z'))
            ->setEndedAtTime(
                new \DateTime('2016-11-15T10:17:20.000Z'))
            ->setExtensions([
                'value' => 'A Caliper Event describes a relationship established between an actor and an object.  The relationship is formed as a result of a purposeful action undertaken by the actor in connection to the object at a particular moment. A learner starting an assessment, annotating a reading, pausing a video, or posting a message to a forum, are examples of learning activities that Caliper models as events.'
            ]);
    }
}
