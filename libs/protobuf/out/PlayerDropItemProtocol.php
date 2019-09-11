<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: dbbuff.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>PlayerDropItemProtocol</code>
 */
class PlayerDropItemProtocol extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint32 lastDropTick = 1;</code>
     */
    private $lastDropTick = 0;
    /**
     * Generated from protobuf field <code>uint32 lastDropEquipPos = 2;</code>
     */
    private $lastDropEquipPos = 0;
    /**
     * Generated from protobuf field <code>repeated uint32 deathTicks = 3;</code>
     */
    private $deathTicks;

    public function __construct() {
        \GPBMetadata\Dbbuff::initOnce();
        parent::__construct();
    }

    /**
     * Generated from protobuf field <code>uint32 lastDropTick = 1;</code>
     * @return int
     */
    public function getLastDropTick()
    {
        return $this->lastDropTick;
    }

    /**
     * Generated from protobuf field <code>uint32 lastDropTick = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setLastDropTick($var)
    {
        GPBUtil::checkUint32($var);
        $this->lastDropTick = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 lastDropEquipPos = 2;</code>
     * @return int
     */
    public function getLastDropEquipPos()
    {
        return $this->lastDropEquipPos;
    }

    /**
     * Generated from protobuf field <code>uint32 lastDropEquipPos = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setLastDropEquipPos($var)
    {
        GPBUtil::checkUint32($var);
        $this->lastDropEquipPos = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated uint32 deathTicks = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getDeathTicks()
    {
        return $this->deathTicks;
    }

    /**
     * Generated from protobuf field <code>repeated uint32 deathTicks = 3;</code>
     * @param int[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setDeathTicks($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::UINT32);
        $this->deathTicks = $arr;

        return $this;
    }

}

