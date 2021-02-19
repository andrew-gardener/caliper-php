<?php

namespace IMSGlobal\Caliper\events;

use IMSGlobal\Caliper\entities\DigitalResource;
use IMSGlobal\Caliper\entities\annotation\Annotation;
use IMSGlobal\Caliper\entities\reading\Frame;

class AnnotationEvent extends Event {
    /** @var DigitalResource */
    private $object;
    /** @var Annotation|null */
    private $generated;
    /** @var Frame */
    private $target;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->setType(new EventType(EventType::ANNOTATION));
    }

    /** @return DigitalResource object */
    public function getObject() {
        return $this->object;
    }

    /**
     * @param DigitalResource $object
     * @throws \InvalidArgumentException DigitalResource expected
     * @return $this|AnnotationEvent
     */
    public function setObject($object) {
        if ($object instanceof DigitalResource) {
            $this->object = $object;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': DigitalResource expected');
    }

    /** @return Annotation|null generated */
    public function getGenerated() {
        return $this->generated;
    }

    /**
     * @param Annotation|null $generated
     * @return $this|AnnotationEvent
     */
    public function setGenerated($generated) {
        if (is_null($generated) || ($generated instanceof Annotation)) {
            $this->generated = $generated;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': Annotation expected');
    }

    /** @return Frame|null target */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param Frame|null $target
     * @return $this|AnnotationEvent
     */
    public function setTarget($target) {
        if (is_null($target) || ($target instanceof Frame)) {
            $this->target = $target;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': Frame expected');
    }
}
