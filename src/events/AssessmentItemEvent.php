<?php

namespace IMSGlobal\Caliper\events;

use IMSGlobal\Caliper\entities\assessment\AssessmentItem;
use IMSGlobal\Caliper\entities\response\Response;
use IMSGlobal\Caliper\entities\Entity;
use IMSGlobal\Caliper\actions\Action;

class AssessmentItemEvent extends Event {
    /** @var AssessmentItem */
    private $object;
    /** @var AssessmentItem */
    private $referrer;
    /** @var Entity|Response|null */
    private $generated;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->setType(new EventType(EventType::ASSESSMENT_ITEM));
    }

    /** @return AssessmentItem object */
    public function getObject() {
        return $this->object;
    }

    /**
     * @param AssessmentItem $object
     * @throws \InvalidArgumentException AssessmentItem expected
     * @return $this|AssessmentItemEvent
     */
    public function setObject($object) {
        if ($object instanceof AssessmentItem) {
            $this->object = $object;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': AssessmentItem expected');
    }

    /** @return AssessmentItem */
    public function getReferrer() {
        return $this->referrer;
    }

    /**
     * @param AssessmentItem $referrer
     * @return $this|AssessmentItemEvent
     */
    public function setReferrer($referrer) {
        if (is_null($referrer) || $referrer instanceof AssessmentItem) {
            $this->referrer = $referrer;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': AssessmentItem expected');
    }

    /** @return Entity|Response|null generated */
    public function getGenerated() {
        return $this->generated;
    }

    /**
     * @param Entity|Response|null $generated
     * @return $this|AssessmentItemEvent
     */
    public function setGenerated($generated) {
        $action = $this->getAction();

        if ($action == Action::COMPLETED) {
            if ($generated instanceof Response) {
                $this->generated = $generated;
                return $this;
            }
            throw new \InvalidArgumentException(__METHOD__ . ': Response expected');
        }

        if (is_null($generated) || ($generated instanceof Entity)) {
            $this->generated = $generated;
            return $this;

        }
        throw new \InvalidArgumentException(__METHOD__ . ': Entity expected');
    }
}
