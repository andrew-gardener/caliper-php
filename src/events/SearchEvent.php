<?php

namespace IMSGlobal\Caliper\events;
use IMSGlobal\Caliper\entities\search\SearchResponse;


class SearchEvent extends Event {
    /** @var SearchResponse */
    private $generated;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->setType(new EventType(EventType::SEARCH));
    }

    /** @return SearchResponse generated */
    public function getGenerated() {
        return $this->generated;
    }

    /**
     * @param SearchResponse $generated
     * @return $this|SearchEvent
     */
    public function setGenerated($generated) {
        if (is_null($generated) || ($generated instanceof SearchResponse)) {
            $this->generated = $generated;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': SearchResponse expected');
    }
}
