<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\actions\Action;
use IMSGlobal\Caliper\events\Event;
use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\Entity;

class EnvelopeTermActionTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();

        $actions = array(
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0001', 'action' => new Action(Action::ABANDONED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0002', 'action' => new Action(Action::ACCEPTED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0003', 'action' => new Action(Action::ACTIVATED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0004', 'action' => new Action(Action::ADDED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0005', 'action' => new Action(Action::ARCHIVED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0006', 'action' => new Action(Action::ATTACHED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0007', 'action' => new Action(Action::BOOKMARKED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0008', 'action' => new Action(Action::CHANGED_RESOLUTION) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0009', 'action' => new Action(Action::CHANGED_SIZE) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0010', 'action' => new Action(Action::CHANGED_SPEED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0011', 'action' => new Action(Action::CHANGED_VOLUME) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0012', 'action' => new Action(Action::CLASSIFIED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0013', 'action' => new Action(Action::CLOSED_POPOUT) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0014', 'action' => new Action(Action::COMMENTED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0015', 'action' => new Action(Action::COMPLETED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0016', 'action' => new Action(Action::COPIED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0017', 'action' => new Action(Action::CREATED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0018', 'action' => new Action(Action::DEACTIVATED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0019', 'action' => new Action(Action::DECLINED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0020', 'action' => new Action(Action::DELETED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0021', 'action' => new Action(Action::DESCRIBED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0022', 'action' => new Action(Action::DISABLED_CLOSED_CAPTIONING) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0023', 'action' => new Action(Action::DISLIKED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0024', 'action' => new Action(Action::DOWNLOADED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0025', 'action' => new Action(Action::ENABLED_CLOSED_CAPTIONING) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0026', 'action' => new Action(Action::ENDED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0027', 'action' => new Action(Action::ENTERED_FULLSCREEN) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0028', 'action' => new Action(Action::EXITED_FULLSCREEN) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0029', 'action' => new Action(Action::FORWARDED_TO) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0030', 'action' => new Action(Action::GRADED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0031', 'action' => new Action(Action::HID) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0032', 'action' => new Action(Action::HIGHLIGHTED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0033', 'action' => new Action(Action::IDENTIFIED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0034', 'action' => new Action(Action::JUMPED_TO) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0035', 'action' => new Action(Action::LAUNCHED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0036', 'action' => new Action(Action::LIKED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0037', 'action' => new Action(Action::LINKED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0038', 'action' => new Action(Action::LOGGED_IN) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0039', 'action' => new Action(Action::LOGGED_OUT) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0040', 'action' => new Action(Action::MARKED_AS_READ) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0041', 'action' => new Action(Action::MARKED_AS_UNREAD) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0042', 'action' => new Action(Action::MODIFIED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0043', 'action' => new Action(Action::MUTED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0044', 'action' => new Action(Action::NAVIGATED_TO) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0045', 'action' => new Action(Action::OPENED_POPOUT) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0046', 'action' => new Action(Action::OPTED_IN) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0047', 'action' => new Action(Action::OPTED_OUT) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0048', 'action' => new Action(Action::PAUSED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0049', 'action' => new Action(Action::POSTED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0050', 'action' => new Action(Action::PRINTED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0051', 'action' => new Action(Action::PUBLISHED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0052', 'action' => new Action(Action::QUESTIONED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0053', 'action' => new Action(Action::RANKED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0054', 'action' => new Action(Action::RECOMMENDED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0055', 'action' => new Action(Action::REMOVED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0056', 'action' => new Action(Action::RESET) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0057', 'action' => new Action(Action::RESTARTED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0058', 'action' => new Action(Action::RESTORED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0059', 'action' => new Action(Action::RESUMED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0060', 'action' => new Action(Action::RETRIEVED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0061', 'action' => new Action(Action::RETURNED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0062', 'action' => new Action(Action::REVIEWED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0063', 'action' => new Action(Action::REWOUND) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0064', 'action' => new Action(Action::SAVED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0065', 'action' => new Action(Action::SEARCHED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0066', 'action' => new Action(Action::SENT) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0067', 'action' => new Action(Action::SHARED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0068', 'action' => new Action(Action::SHOWED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0069', 'action' => new Action(Action::SKIPPED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0070', 'action' => new Action(Action::STARTED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0071', 'action' => new Action(Action::SUBMITTED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0072', 'action' => new Action(Action::SUBSCRIBED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0073', 'action' => new Action(Action::TAGGED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0074', 'action' => new Action(Action::TIMED_OUT) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0075', 'action' => new Action(Action::UNMUTED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0076', 'action' => new Action(Action::UNPUBLISHED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0077', 'action' => new Action(Action::UNSUBSCRIBED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0078', 'action' => new Action(Action::UPLOADED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0079', 'action' => new Action(Action::USED) ),
            array( 'id' => 'urn:uuid:7d757c17-2f2f-4e39-9d50-fd83494f0080', 'action' => new Action(Action::VIEWED) )
        );

        $data = array();
        foreach ($actions as $item) {
            $data[]= ( new Event($item['id']) )
                ->setActor( (Person::makeAnonymous())->makeReference() )
                ->setAction( $item['action'] )
                ->setObject( (Entity::makeAnonymous())->makeReference() )
                ->setEventTime( new \DateTime('2020-01-22T10:05:00.000Z') );
        }

        $this->setTestObject((new \IMSGlobal\Caliper\request\Envelope())
            ->setSensorId(new \IMSGlobal\Caliper\Sensor('https://example.edu/sensors/1'))
            ->setSendTime(new \DateTime('2020-01-22T10:05:00.000Z'))
            ->setData($data)
        );
    }
}
