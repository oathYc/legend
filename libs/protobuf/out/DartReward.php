<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: dbbuff.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>DartReward</code>
 */
class DartReward extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string roleSID = 1;</code>
     */
    private $roleSID = '';
    /**
     * Generated from protobuf field <code>uint32 rewardExp = 2;</code>
     */
    private $rewardExp = 0;
    /**
     * Generated from protobuf field <code>uint32 count = 3;</code>
     */
    private $count = 0;

    public function __construct() {
        \GPBMetadata\Dbbuff::initOnce();
        parent::__construct();
    }

    /**
     * Generated from protobuf field <code>string roleSID = 1;</code>
     * @return string
     */
    public function getRoleSID()
    {
        return $this->roleSID;
    }

    /**
     * Generated from protobuf field <code>string roleSID = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setRoleSID($var)
    {
        GPBUtil::checkString($var, True);
        $this->roleSID = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 rewardExp = 2;</code>
     * @return int
     */
    public function getRewardExp()
    {
        return $this->rewardExp;
    }

    /**
     * Generated from protobuf field <code>uint32 rewardExp = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setRewardExp($var)
    {
        GPBUtil::checkUint32($var);
        $this->rewardExp = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 count = 3;</code>
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Generated from protobuf field <code>uint32 count = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setCount($var)
    {
        GPBUtil::checkUint32($var);
        $this->count = $var;

        return $this;
    }

}

