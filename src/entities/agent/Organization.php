<?php

namespace IMSGlobal\Caliper\entities\agent;

use IMSGlobal\Caliper\entities;

class Organization extends Agent implements entities\w3c\Organization {
    /** @var entities\agent\Organization */
    private $subOrganizationOf;
    /** @var entities\agent\Agent[] */
    private $members;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::ORGANIZATION));
    }

    public function jsonSerialize() {
        $serializedParent = parent::jsonSerialize();
        if (!is_array($serializedParent)) return $serializedParent;
        return $this->removeChildEntitySameContexts(array_merge($serializedParent, [
            'members' => $this->getMembers(),
            'subOrganizationOf' => $this->getSubOrganizationOf(),
        ]));

    }

    /** @return entities\agent\Agent[] */
    public function getMembers() {
        return $this->members;
    }

    /**
     * @param entities\agent\Agent[] $members
     * @return $this|Organization
     */
    public function setMembers($members) {
        if (!is_null($members)) {
            if (!is_array($members)) {
                $members = [$members];
            }

            foreach ($members as $member) {
                if (!($member instanceof entities\agent\Agent)) {
                    throw new \InvalidArgumentException(__METHOD__ . ': array of Agent expected');
                }
            }
        }

        $this->members = $members;
        return $this;
    }

    /** @return entities\agent\Organization */
    public function getSubOrganizationOf() {
        return $this->subOrganizationOf;
    }

    /**
     * @param entities\agent\Organization $subOrganizationOf
     * @return $this|Organization
     */
    public function setSubOrganizationOf(entities\agent\Organization $subOrganizationOf) {
        $this->subOrganizationOf = $subOrganizationOf;
        return $this;
    }
}
