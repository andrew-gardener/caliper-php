<?php

namespace IMSGlobal\Caliper\events;
use IMSGlobal\Caliper\entities\feedback\Rating;
use IMSGlobal\Caliper\entities\feedback\Comment;
use IMSGlobal\Caliper\entities\reading\Frame;

class FeedbackEvent extends Event {
    /** @var Rating|Comment|null */
    private $generated;
    /** @var Frame */
    private $target;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->setType(new EventType(EventType::FEEDBACK));
    }

    /** @return Rating|Comment|null generated */
    public function getGenerated() {
        return $this->generated;
    }

    /**
     * @param Rating|Comment|null $generated
     * @return $this|FeedbackEvent
     */
    public function setGenerated($generated) {
        if (is_null($generated) || ($generated instanceof Rating) || ($generated instanceof Comment)) {
            $this->generated = $generated;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': Rating or Comment expected');
    }

    /** @return Frame|null target */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param Frame|null $target
     * @return $this|FeedbackEvent
     */
    public function setTarget($target) {
        if (is_null($target) || ($target instanceof Frame)) {
            $this->target = $target;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': Frame expected');
    }
}
