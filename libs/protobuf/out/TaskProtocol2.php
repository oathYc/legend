<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: dbbuff.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>TaskProtocol2</code>
 */
class TaskProtocol2 extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated uint32 branchDones = 1;</code>
     */
    private $branchDones;

    public function __construct() {
        \GPBMetadata\Dbbuff::initOnce();
        parent::__construct();
    }

    /**
     * Generated from protobuf field <code>repeated uint32 branchDones = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getBranchDones()
    {
        return $this->branchDones;
    }

    /**
     * Generated from protobuf field <code>repeated uint32 branchDones = 1;</code>
     * @param int[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setBranchDones($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::UINT32);
        $this->branchDones = $arr;

        return $this;
    }

}

