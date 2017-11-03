<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Understand\Service;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Rest\Preview\Understand\Service\Intent\FieldList;
use Twilio\Rest\Preview\Understand\Service\Intent\SampleList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 * 
 * @property \Twilio\Rest\Preview\Understand\Service\Intent\FieldList fields
 * @property \Twilio\Rest\Preview\Understand\Service\Intent\SampleList samples
 * @method \Twilio\Rest\Preview\Understand\Service\Intent\FieldContext fields(string $sid)
 * @method \Twilio\Rest\Preview\Understand\Service\Intent\SampleContext samples(string $sid)
 */
class IntentContext extends InstanceContext {
    protected $_fields = null;
    protected $_samples = null;

    /**
     * Initialize the IntentContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Preview\Understand\Service\IntentContext 
     */
    public function __construct(Version $version, $serviceSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'sid' => $sid,);

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Intents/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a IntentInstance
     * 
     * @return IntentInstance Fetched IntentInstance
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new IntentInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the IntentInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return IntentInstance Updated IntentInstance
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'UniqueName' => $options['uniqueName'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new IntentInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the IntentInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Access the fields
     * 
     * @return \Twilio\Rest\Preview\Understand\Service\Intent\FieldList 
     */
    protected function getFields() {
        if (!$this->_fields) {
            $this->_fields = new FieldList($this->version, $this->solution['serviceSid'], $this->solution['sid']);
        }

        return $this->_fields;
    }

    /**
     * Access the samples
     * 
     * @return \Twilio\Rest\Preview\Understand\Service\Intent\SampleList 
     */
    protected function getSamples() {
        if (!$this->_samples) {
            $this->_samples = new SampleList(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sid']
            );
        }

        return $this->_samples;
    }

    /**
     * Magic getter to lazy load subresources
     * 
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws \Twilio\Exceptions\TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     * 
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws \Twilio\Exceptions\TwilioException For unknown resource
     */
    public function __call($name, $arguments) {
        $property = $this->$name;
        if (method_exists($property, 'getContext')) {
            return call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.Understand.IntentContext ' . implode(' ', $context) . ']';
    }
}