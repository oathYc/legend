<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: dbbuff.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>MazeCurState</code>
 */
class MazeCurState extends \Google\Protobuf\Internal\Message
{
    /**
     *迷仙阵房间状态信息
     *
     * Generated from protobuf field <code>repeated .MazeNodeState curState = 1;</code>
     */
    private $curState;

    public function __construct() {
        \GPBMetadata\Dbbuff::initOnce();
        parent::__construct();
    }

    /**
     *迷仙阵房间状态信息
     *
     * Generated from protobuf field <code>repeated .MazeNodeState curState = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCurState()
    {
        return $this->curState;
    }

    /**
     *迷仙阵房间状态信息
     *
     * Generated from protobuf field <code>repeated .MazeNodeState curState = 1;</code>
     * @param \MazeNodeState[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCurState($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \MazeNodeState::class);
        $this->curState = $arr;

        return $this;
    }

}

