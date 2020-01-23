<?php
namespace IMSGlobal\Caliper\entities\measure;

use IMSGlobal\Caliper;

class Metric extends Caliper\util\BasicEnum {
    const
        __default = '',
        ASSESSMENTS_PASSED = 'AssessmentsPassed',
        ASSESSMENTS_SUBMITTED = 'AssessmentsSubmitted',
        MINUTES_ON_TASK = 'MinutesOnTask',
        SKILLS_MASTERED = 'SkillsMastered',
        STANDARDS_MASTERED = 'StandardsMastered',
        UNITS_COMPLETED = 'UnitsCompleted',
        UNITS_PASSED = 'UnitsPassed',
        WORDS_READ = 'WordsRead';
}