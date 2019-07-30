<?php

namespace IMSGlobal\Caliper\events;

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\survey\SurveyInvitation;
use IMSGlobal\Caliper\context\Context;

class SurveyInvitationEvent extends Event {
    /** @var Person */
    private $actor;
    /** @var SurveyInvitation */
    private $object;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->setType(new EventType(EventType::SURVEY_INVITATION));
        $this->setContext(new Context(Context::SURVEY_PROFILE_EXTENSION));
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
        if (is_null($actor) || is_string($actor) || ($actor instanceof Person)) {
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
        if (is_null($object) || is_string($object) || ($object instanceof SurveyInvitation)) {
            $this->object = $object;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': SurveyInvitation expected');
    }
}
