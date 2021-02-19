<?php

namespace IMSGlobal\Caliper\events;

use IMSGlobal\Caliper\entities\media\MediaObject;
use IMSGlobal\Caliper\entities\media\MediaLocation;

class MediaEvent extends Event {
    /** @var MediaObject */
    private $object;
    /** @var MediaLocation */
    private $target;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->setType(new EventType(EventType::MEDIA));
    }

    /** @return MediaObject object */
    public function getObject() {
        return $this->object;
    }

    /**
     * @param MediaObject $object
     * @throws \InvalidArgumentException MediaObject expected
     * @return $this|MediaEvent
     */
    public function setObject($object) {
        if ($object instanceof MediaObject) {
            $this->object = $object;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': MediaObject expected');
    }

    /** @return MediaLocation|null target */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param MediaLocation|null $target
     * @return $this|MediaEvent
     */
    public function setTarget($target) {
        if (is_null($target) || ($target instanceof MediaLocation)) {
            $this->target = $target;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': MediaLocation expected');
    }
}
