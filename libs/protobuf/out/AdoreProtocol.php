<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: dbbuff.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>AdoreProtocol</code>
 */
class AdoreProtocol extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string datas = 1;</code>
     */
    private $datas = '';

    public function __construct() {
        \GPBMetadata\Dbbuff::initOnce();
        parent::__construct();
    }

    /**
     * Generated from protobuf field <code>string datas = 1;</code>
     * @return string
     */
    public function getDatas()
    {
        return $this->datas;
    }

    /**
     * Generated from protobuf field <code>string datas = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setDatas($var)
    {
        GPBUtil::checkString($var, True);
        $this->datas = $var;

        return $this;
    }

}

