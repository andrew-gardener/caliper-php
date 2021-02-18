<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\question\DateTimeQuestion;

/**
 * @requires PHP 5.6.28
 */
class EntityDateTimeQuestion_MalformedMaxLabelNotAnIntTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\question\DateTimeQuestion::setMaxLabel: string expected');

        (new DateTimeQuestion('https://example.edu/surveys/100/questionnaires/30/items/3/question'))
            ->setQuestionPosed('When would you be available for an exam next term?')
            ->setMinDateTime(new \DateTime('2018-09-01T06:00:00.000Z'))
            ->setMinLabel('Start of Term')
            ->setMaxDateTime(new \DateTime('2018-12-30T06:00:00.000Z'))
            ->setMaxLabel(10);
    }
}
