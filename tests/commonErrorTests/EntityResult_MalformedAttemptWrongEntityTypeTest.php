<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\agent\SoftwareApplication;
use IMSGlobal\Caliper\entities\assignable\Attempt;
use IMSGlobal\Caliper\entities\outcome\Result;

/**
 * @requires PHP 5.6.28
 */
class EntityResult_MalformedAttemptWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\outcome\Result::setAttempt: Attempt expected');

        (new Result('https://example.edu/terms/201601/courses/7/sections/1/assess/1/users/554433/attempts/1/results/1'))
            ->setAttempt(
                (new Person('https://example.edu/users/554433'))
            )
            ->setMaxResultScore(15.0)
            ->setResultScore(10.0)
            ->setScoredBy(
                (new SoftwareApplication('https://example.edu/autograder'))
                    ->setDateCreated(
                        new \DateTime('2016-11-15T10:55:58.000Z'))
            )
            ->setComment('Consider retaking the assessment.')
            ->setDateCreated(new \DateTime('2016-11-15T10:56:00.000Z'));
    }
}