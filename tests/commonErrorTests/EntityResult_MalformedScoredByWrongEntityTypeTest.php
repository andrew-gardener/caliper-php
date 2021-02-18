<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\assessment\Assessment;
use IMSGlobal\Caliper\entities\assignable\Attempt;
use IMSGlobal\Caliper\entities\outcome\Result;

/**
 * @requires PHP 5.6.28
 */
class EntityResult_MalformedScoredByWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(TypeError::class);
        // skipping error message since it includes file path
        // $this->expectExceptionMessage('');

        (new Result('https://example.edu/terms/201601/courses/7/sections/1/assess/1/users/554433/attempts/1/results/1'))
            ->setAttempt(
                (new Attempt('https://example.edu/terms/201601/courses/7/sections/1/assess/1/users/554433/attempts/1'))
                    ->setAssignee(
                        (new Person('https://example.edu/users/554433'))
                    )
                    ->setAssignable(
                        (new Assessment('https://example.edu/terms/201601/courses/7/sections/1/assess/1'))
                    )
                    ->setCount(1)
                    ->setDateCreated(new \DateTime('2016-11-15T10:05:00.000Z'))
                    ->setStartedAtTime(new \DateTime('2016-11-15T10:05:00.000Z'))
                    ->setEndedAtTime(new \DateTime('2016-11-15T10:55:30.000Z'))
                    ->setDuration('PT50M30S')
            )
            ->setMaxResultScore(15.0)
            ->setResultScore(10.0)
            ->setScoredBy(
                (new Assessment('https://example.edu/terms/201601/courses/7/sections/1/assess/1'))
            )
            ->setComment('Consider retaking the assessment.')
            ->setDateCreated(new \DateTime('2016-11-15T10:56:00.000Z'));
    }
}
