<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: dbbuff.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>PBBuff</code>
 */
class PBBuff extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint32 id = 1;</code>
     */
    private $id = 0;
    /**
     * Generated from protobuf field <code>uint32 hurt = 2;</code>
     */
    private $hurt = 0;
    /**
     * Generated from protobuf field <code>uint32 tick = 3;</code>
     */
    private $tick = 0;
    /**
     * Generated from protobuf field <code>uint32 itemId = 4;</code>
     */
    private $itemId = 0;

    public function __construct() {
        \GPBMetadata\Dbbuff::initOnce();
        parent::__construct();
    }

    /**
     * Generated from protobuf field <code>uint32 id = 1;</code>
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Generated from protobuf field <code>uint32 id = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkUint32($var);
        $this->id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 hurt = 2;</code>
     * @return int
     */
    public function getHurt()
    {
        return $this->hurt;
    }

    /**
     * Generated from protobuf field <code>uint32 hurt = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setHurt($var)
    {
        GPBUtil::checkUint32($var);
        $this->hurt = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 tick = 3;</code>
     * @return int
     */
    public function getTick()
    {
        return $this->tick;
    }

    /**
     * Generated from protobuf field <code>uint32 tick = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setTick($var)
    {
        GPBUtil::checkUint32($var);
        $this->tick = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 itemId = 4;</code>
     * @return int
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Generated from protobuf field <code>uint32 itemId = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setItemId($var)
    {
        GPBUtil::checkUint32($var);
        $this->itemId = $var;

        return $this;
    }

}

