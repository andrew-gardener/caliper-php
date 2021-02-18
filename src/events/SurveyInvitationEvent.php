<?php

namespace IMSGlobal\Caliper\events;

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\survey\SurveyInvitation;

class SurveyInvitationEvent extends Event {
    /** @var Person */
    private $actor;
    /** @var SurveyInvitation */
    private $object;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->setType(new EventType(EventType::SURVEY_INVITATION));
    }

    /** @return Person object */
    public function getActor() {
        return $this->actor;
    }

    /**
     * @param Person $object
     * @throws \InvalidArgumentException Person expected
     * @return $this|SurveyInvitationEvent
     */
    public function setActor($actor) {
        if ($actor instanceof Person) {
            $this->actor = $actor;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': Person expected');
    }

    /** @return SurveyInvitation object */
    public function getObject() {
        return $this->object;
    }

    /**
     * @param SurveyInvitation $object
     * @throws \InvalidArgumentException SurveyInvitation expected
     * @return $this|SurveyInvitationEvent
     */
    public function setObject($object) {
        if ($object instanceof SurveyInvitation) {
            $this->object = $object;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': SurveyInvitation expected');
    }
}
