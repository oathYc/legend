<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: dbbuff.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>LimitProtocol</code>
 */
class LimitProtocol extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .PBIimitAttr limits = 1;</code>
     */
    private $limits;

    public function __construct() {
        \GPBMetadata\Dbbuff::initOnce();
        parent::__construct();
    }

    /**
     * Generated from protobuf field <code>repeated .PBIimitAttr limits = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLimits()
    {
        return $this->limits;
    }

    /**
     * Generated from protobuf field <code>repeated .PBIimitAttr limits = 1;</code>
     * @param \PBIimitAttr[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLimits($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \PBIimitAttr::class);
        $this->limits = $arr;

        return $this;
    }

}

