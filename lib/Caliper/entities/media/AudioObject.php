<?php
require_once 'Sensor.php';
require_once 'Caliper/entities/media/MediaObject.php';
require_once 'Caliper/entities/media/MediaObjectType.php';
require_once 'Caliper/entities/schemadotorg/AudioObject.php';

class AudioObject extends MediaObject implements schemadotorg\AudioObject {
    /** @var string */
    private $volumeMin;
    /** @var string */
    private $volumeMax;
    /** @var string */
    private $volumeLevel;
    /** @var bool */
    private $muted;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new MediaObjectType(MediaObjectType::AUDIO_OBJECT));
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'volumeMin' => $this->getVolumeMin(),
            'volumeMax' => $this->getVolumeMax(),
            'volumeLevel' => $this->getVolumeLevel(),
            'muted' => $this->getMuted(),
        ]);
    }

    /** @return string volumeMin */
    public function getVolumeMin() {
        return $this->volumeMin;
    }

    /**
     * @param string $volumeMin
     * @return $this|AudioObject
     */
    public function setVolumeMin($volumeMin) {
        if (!is_string($volumeMin)) {
            throw new InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->volumeMin = $volumeMin;
        return $this;
    }

    /** @return string volumeMax */
    public function getVolumeMax() {
        return $this->volumeMax;
    }

    /**
     * @param string $volumeMax
     * @return $this|AudioObject
     */
    public function setVolumeMax($volumeMax) {
        if (!is_string($volumeMax)) {
            throw new InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->volumeMax = $volumeMax;
        return $this;
    }

    /** @return string volumeLevel */
    public function getVolumeLevel() {
        return $this->volumeLevel;
    }

    /**
     * @param string $volumeLevel
     * @return $this|AudioObject
     */
    public function setVolumeLevel($volumeLevel) {
        if (!is_string($volumeLevel)) {
            throw new InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->volumeLevel = $volumeLevel;
        return $this;
    }

    /** @return bool muted */
    public function getMuted() {
        return $this->muted;
    }

    /**
     * @param bool $muted
     * @return $this|AudioObject
     */
    public function setMuted($muted) {
        if (!is_bool($muted)) {
            throw new InvalidArgumentException(__METHOD__ . ': bool expected');
        }

        $this->muted = $muted;
        return $this;
    }
}