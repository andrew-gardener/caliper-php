<?php
require_once __DIR__ . '/../CaliperTestCase.php';

use IMSGlobal\Caliper\entities\lis\Role;
use IMSGlobal\Caliper\entities\lis\Membership;

class EnvelopeTermLISRoleTest extends CaliperTestCase {
    function setUp() {
        $this->setFixtureRelativeSubDirectoryPath('/constantsFixtures');
        parent::setUp();

        $role_sets = array(
            [ new Role(Role::ADMINISTRATOR) ],
            [ new Role(Role::ADMINISTRATOR), new Role(Role::ADMINISTRATOR_ADMINISTRATOR) ],
            [ new Role(Role::ADMINISTRATOR), new Role(Role::ADMINISTRATOR_DEVELOPER) ],
            [ new Role(Role::ADMINISTRATOR), new Role(Role::ADMINISTRATOR_EXTERNAL_DEVELOPER) ],
            [ new Role(Role::ADMINISTRATOR), new Role(Role::ADMINISTRATOR_EXTERNAL_SUPPORT) ],
            [ new Role(Role::ADMINISTRATOR), new Role(Role::ADMINISTRATOR_EXTERNAL_SYSTEM_ADMINISTRATOR) ],
            [ new Role(Role::ADMINISTRATOR), new Role(Role::ADMINISTRATOR_SUPPORT) ],
            [ new Role(Role::ADMINISTRATOR), new Role(Role::ADMINISTRATOR_SYSTEM_ADMINISTRATOR) ],

            [ new Role(Role::CONTENT_DEVELOPER) ],
            [ new Role(Role::CONTENT_DEVELOPER), new Role(Role::CONTENT_DEVELOPER_CONTENT_DEVELOPER) ],
            [ new Role(Role::CONTENT_DEVELOPER), new Role(Role::CONTENT_DEVELOPER_CONTENT_EXPERT) ],
            [ new Role(Role::CONTENT_DEVELOPER), new Role(Role::CONTENT_DEVELOPER_EXTERNAL_CONTENT_EXPERT) ],
            [ new Role(Role::CONTENT_DEVELOPER), new Role(Role::CONTENT_DEVELOPER_LIBRARIAN) ],

            [ new Role(Role::INSTRUCTOR) ],
            [ new Role(Role::INSTRUCTOR), new Role(Role::EXTERNAL_INSTRUCTOR) ],
            [ new Role(Role::INSTRUCTOR), new Role(Role::GRADER) ],
            [ new Role(Role::INSTRUCTOR), new Role(Role::GUEST_INSTRUCTOR) ],
            [ new Role(Role::INSTRUCTOR), new Role(Role::INSTRUCTOR_INSTRUCTOR) ],
            [ new Role(Role::INSTRUCTOR), new Role(Role::LECTURER) ],
            [ new Role(Role::INSTRUCTOR), new Role(Role::PRIMARY_INSTRUCTOR) ],
            [ new Role(Role::INSTRUCTOR), new Role(Role::SECONDARY_INSTRUCTOR) ],
            [ new Role(Role::INSTRUCTOR), new Role(Role::TEACHING_ASSISTANT) ],
            [ new Role(Role::INSTRUCTOR), new Role(Role::TEACHING_ASSISTANT_GROUP) ],
            [ new Role(Role::INSTRUCTOR), new Role(Role::TEACHING_ASSISTANT_OFFERING) ],
            [ new Role(Role::INSTRUCTOR), new Role(Role::TEACHING_ASSISTANT_SECTION) ],
            [ new Role(Role::INSTRUCTOR), new Role(Role::TEACHING_ASSISTANT_TEMPLATE) ],

            [ new Role(Role::LEARNER) ],
            [ new Role(Role::LEARNER), new Role(Role::EXTERNAL_LEARNER) ],
            [ new Role(Role::LEARNER), new Role(Role::GUEST_LEARNER) ],
            [ new Role(Role::LEARNER), new Role(Role::LEARNER_LEARNER) ],
            [ new Role(Role::LEARNER), new Role(Role::NONCREDIT_LEARNER) ],

            [ new Role(Role::MANAGER) ],
            [ new Role(Role::MANAGER), new Role(Role::MANAGER_AREA_MANAGER) ],
            [ new Role(Role::MANAGER), new Role(Role::MANAGER_COURSE_COORDINATOR) ],
            [ new Role(Role::MANAGER), new Role(Role::MANAGER_EXTERNAL_OBSERVER) ],
            [ new Role(Role::MANAGER), new Role(Role::MANAGER_MANAGER) ],
            [ new Role(Role::MANAGER), new Role(Role::MANAGER_OBSERVER) ],

            [ new Role(Role::MEMBER) ],
            [ new Role(Role::MEMBER), new Role(Role::MEMBER_MEMBER) ],

            [ new Role(Role::MENTOR) ],
            [ new Role(Role::MENTOR), new Role(Role::MENTOR_ADVISOR) ],
            [ new Role(Role::MENTOR), new Role(Role::MENTOR_EXTERNAL_ADVISOR) ],
            [ new Role(Role::MENTOR), new Role(Role::MENTOR_EXTERNAL_AUDITOR) ],
            [ new Role(Role::MENTOR), new Role(Role::MENTOR_EXTERNAL_LEARNING_FACILITATOR) ],
            [ new Role(Role::MENTOR), new Role(Role::MENTOR_EXTERNAL_MENTOR) ],
            [ new Role(Role::MENTOR), new Role(Role::MENTOR_EXTERNAL_REVIEWER) ],
            [ new Role(Role::MENTOR), new Role(Role::MENTOR_EXTERNAL_TUTOR) ],
            [ new Role(Role::MENTOR), new Role(Role::MENTOR_LEARNING_FACILITATOR) ],
            [ new Role(Role::MENTOR), new Role(Role::MENTOR_MENTOR) ],
            [ new Role(Role::MENTOR), new Role(Role::MENTOR_REVIEWER) ],
            [ new Role(Role::MENTOR), new Role(Role::MENTOR_TUTOR) ],

            [ new Role(Role::OFFICER) ],
            [ new Role(Role::OFFICER), new Role(Role::OFFICER_CHAIR) ],
            [ new Role(Role::OFFICER), new Role(Role::OFFICER_SECRETARY) ],
            [ new Role(Role::OFFICER), new Role(Role::OFFICER_TREASURER) ],
            [ new Role(Role::OFFICER), new Role(Role::OFFICER_VICE_CHAIR) ]
        );

        $data = array();
        foreach ($role_sets as $role_set) {
            $data[]= ( Membership::makeAnonymous() )
                ->setRoles( $role_set );
        }

        $this->setTestObject((new \IMSGlobal\Caliper\request\Envelope())
            ->setSensorId(new \IMSGlobal\Caliper\Sensor('https://example.edu/sensors/1'))
            ->setSendTime(new \DateTime('2020-01-22T10:05:00.000Z'))
            ->setData($data)
        );
    }
}
