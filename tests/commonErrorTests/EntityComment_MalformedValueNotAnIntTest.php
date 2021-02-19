<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\feedback\Comment;
use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\DigitalResource;
use IMSGlobal\Caliper\entities\DigitalResourceCollection;
use IMSGlobal\Caliper\entities\lis\CourseSection;

/**
 * @requires PHP 5.6.28
 */
class EntityComment_MalformedValueNotAnIntTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\feedback\Comment::setValue: string expected');

        (new Comment('https://example.edu/terms/201801/courses/7/sections/1/assess/1/items/6/users/665544/responses/1/comment/1'))
            ->setCommenter(
                (new Person('https://example.edu/users/554433'))
            )
            ->setCommentedOn(
                (new DigitalResource('https://example.edu/terms/201801/courses/7/sections/1/resources/1/syllabus.pdf'))
                    ->setName('Course Syllabus')
                    ->setMediaType('application/pdf')
                    ->setIsPartOf((new DigitalResourceCollection('https://example.edu/terms/201801/courses/7/sections/1/resources/1'))
                        ->setName('Course Assets')
                        ->setIsPartOf(new CourseSection('https://example.edu/terms/201801/courses/7/sections/1'))
                    )
                    ->setDateCreated(new \DateTime('2018-08-02T11:32:00.000Z'))
            )
            ->setValue(10)
            ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z'));
    }
}
