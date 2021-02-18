<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\question\RatingScaleQuestion;
use IMSGlobal\Caliper\entities\agent\Person;

/**
 * @requires PHP 5.6.28
 */
class EntityRatingScaleQuestion_MalformedScaleWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(TypeError::class);
        // skipping error message since it includes file path
        // $this->expectExceptionMessage('');

        (new RatingScaleQuestion('https://example.edu/question/2'))
            ->setQuestionPosed('Do you agree with the opinion presented?')
            ->setScale(
                (new Person('https://example.edu/users/554433'))
            );
    }
}
