<?php

namespace IMSGlobal\Caliper\events;

use IMSGlobal\Caliper\profiles;
use IMSGlobal\Caliper\actions;
use IMSGlobal\Caliper\entities;
use IMSGlobal\Caliper\entities\DigitalResource;
use IMSGlobal\Caliper\entities\survey\Questionnaire;
use IMSGlobal\Caliper\entities\survey\QuestionnaireItem;
use IMSGlobal\Caliper\entities\agent\SoftwareApplication;

class NavigationEvent extends Event {
    /** @var DigitalResource */
    private $object;
    /** @var DigitalResource */
    private $target;
    /** @var DigitalResource|SoftwareApplication */
    private $referrer;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->setType(new EventType(EventType::NAVIGATION))
            ->setAction(new actions\Action(actions\Action::NAVIGATED_TO));
    }

    /** @return DigitalResource object */
    public function getObject() {
        return $this->object;
    }

    /**
     * @param DigitalResource $object
     * @throws \InvalidArgumentException DigitalResource expected
     * @return $this|NavigationEvent
     */
    public function setObject($object) {
        if ($object instanceof DigitalResource) {
            $this->object = $object;
            if ($this->profile === profiles\Profile::SURVEY) {
                if (!$object instanceof Questionnaire && !$object instanceof QuestionnaireItem) {
                    throw new \InvalidArgumentException(__METHOD__ . ': Questionnaire or QuestionnaireItem expected');
                }
            }
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': DigitalResource expected');
    }

    /** @return DigitalResource|null target */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param DigitalResource|null $target
     * @return $this|NavigationEvent
     */
    public function setTarget($target) {
        if (is_null($target) || ($target instanceof DigitalResource)) {
            $this->target = $target;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': DigitalResource expected');
    }

    /** @return DigitalResource|SoftwareApplication */
    public function getReferrer() {
        return $this->referrer;
    }

    /**
     * @param DigitalResource|SoftwareApplication $referrer
     * @return $this|NavigationEvent
     */
    public function setReferrer($referrer) {
        if (is_null($referrer) || $referrer instanceof DigitalResource || $referrer instanceof SoftwareApplication) {
            $this->referrer = $referrer;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': DigitalResource or SoftwareApplication expected');
    }
}
