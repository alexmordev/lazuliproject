<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v8/common/ad_type_infos.proto

namespace Google\Ads\GoogleAds\V8\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A text ad.
 *
 * Generated from protobuf message <code>google.ads.googleads.v8.common.TextAdInfo</code>
 */
class TextAdInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * The headline of the ad.
     *
     * Generated from protobuf field <code>string headline = 4;</code>
     */
    protected $headline = null;
    /**
     * The first line of the ad's description.
     *
     * Generated from protobuf field <code>string description1 = 5;</code>
     */
    protected $description1 = null;
    /**
     * The second line of the ad's description.
     *
     * Generated from protobuf field <code>string description2 = 6;</code>
     */
    protected $description2 = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $headline
     *           The headline of the ad.
     *     @type string $description1
     *           The first line of the ad's description.
     *     @type string $description2
     *           The second line of the ad's description.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V8\Common\AdTypeInfos::initOnce();
        parent::__construct($data);
    }

    /**
     * The headline of the ad.
     *
     * Generated from protobuf field <code>string headline = 4;</code>
     * @return string
     */
    public function getHeadline()
    {
        return isset($this->headline) ? $this->headline : '';
    }

    public function hasHeadline()
    {
        return isset($this->headline);
    }

    public function clearHeadline()
    {
        unset($this->headline);
    }

    /**
     * The headline of the ad.
     *
     * Generated from protobuf field <code>string headline = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setHeadline($var)
    {
        GPBUtil::checkString($var, True);
        $this->headline = $var;

        return $this;
    }

    /**
     * The first line of the ad's description.
     *
     * Generated from protobuf field <code>string description1 = 5;</code>
     * @return string
     */
    public function getDescription1()
    {
        return isset($this->description1) ? $this->description1 : '';
    }

    public function hasDescription1()
    {
        return isset($this->description1);
    }

    public function clearDescription1()
    {
        unset($this->description1);
    }

    /**
     * The first line of the ad's description.
     *
     * Generated from protobuf field <code>string description1 = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription1($var)
    {
        GPBUtil::checkString($var, True);
        $this->description1 = $var;

        return $this;
    }

    /**
     * The second line of the ad's description.
     *
     * Generated from protobuf field <code>string description2 = 6;</code>
     * @return string
     */
    public function getDescription2()
    {
        return isset($this->description2) ? $this->description2 : '';
    }

    public function hasDescription2()
    {
        return isset($this->description2);
    }

    public function clearDescription2()
    {
        unset($this->description2);
    }

    /**
     * The second line of the ad's description.
     *
     * Generated from protobuf field <code>string description2 = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription2($var)
    {
        GPBUtil::checkString($var, True);
        $this->description2 = $var;

        return $this;
    }

}

