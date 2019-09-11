<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: dbbuff.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>EmailProtocol</code>
 */
class EmailProtocol extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string title = 1;</code>
     */
    private $title = '';
    /**
     * Generated from protobuf field <code>string desc = 2;</code>
     */
    private $desc = '';
    /**
     * Generated from protobuf field <code>string sender = 3;</code>
     */
    private $sender = '';
    /**
     * Generated from protobuf field <code>uint32 startDate = 4;</code>
     */
    private $startDate = 0;
    /**
     * Generated from protobuf field <code>uint32 endDate = 5;</code>
     */
    private $endDate = 0;
    /**
     * Generated from protobuf field <code>uint32 descId = 6;</code>
     */
    private $descId = 0;
    /**
     * Generated from protobuf field <code>string emailId = 7;</code>
     */
    private $emailId = '';
    /**
     * Generated from protobuf field <code>repeated string params = 9;</code>
     */
    private $params;
    /**
     * Generated from protobuf field <code>repeated .EmailItem items = 10;</code>
     */
    private $items;
    /**
     * Generated from protobuf field <code>repeated .PBItem insItems = 11;</code>
     */
    private $insItems;
    /**
     * Generated from protobuf field <code>string hyperlink = 12;</code>
     */
    private $hyperlink = '';
    /**
     * Generated from protobuf field <code>string linkContent = 13;</code>
     */
    private $linkContent = '';
    /**
     * Generated from protobuf field <code>uint32 source = 14;</code>
     */
    private $source = 0;
    /**
     * Generated from protobuf field <code>uint32 type = 15;</code>
     */
    private $type = 0;

    public function __construct() {
        \GPBMetadata\Dbbuff::initOnce();
        parent::__construct();
    }

    /**
     * Generated from protobuf field <code>string title = 1;</code>
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Generated from protobuf field <code>string title = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setTitle($var)
    {
        GPBUtil::checkString($var, True);
        $this->title = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string desc = 2;</code>
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Generated from protobuf field <code>string desc = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setDesc($var)
    {
        GPBUtil::checkString($var, True);
        $this->desc = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string sender = 3;</code>
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Generated from protobuf field <code>string sender = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setSender($var)
    {
        GPBUtil::checkString($var, True);
        $this->sender = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 startDate = 4;</code>
     * @return int
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Generated from protobuf field <code>uint32 startDate = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setStartDate($var)
    {
        GPBUtil::checkUint32($var);
        $this->startDate = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 endDate = 5;</code>
     * @return int
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Generated from protobuf field <code>uint32 endDate = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setEndDate($var)
    {
        GPBUtil::checkUint32($var);
        $this->endDate = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 descId = 6;</code>
     * @return int
     */
    public function getDescId()
    {
        return $this->descId;
    }

    /**
     * Generated from protobuf field <code>uint32 descId = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setDescId($var)
    {
        GPBUtil::checkUint32($var);
        $this->descId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string emailId = 7;</code>
     * @return string
     */
    public function getEmailId()
    {
        return $this->emailId;
    }

    /**
     * Generated from protobuf field <code>string emailId = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setEmailId($var)
    {
        GPBUtil::checkString($var, True);
        $this->emailId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated string params = 9;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Generated from protobuf field <code>repeated string params = 9;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setParams($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->params = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .EmailItem items = 10;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Generated from protobuf field <code>repeated .EmailItem items = 10;</code>
     * @param \EmailItem[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setItems($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \EmailItem::class);
        $this->items = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .PBItem insItems = 11;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getInsItems()
    {
        return $this->insItems;
    }

    /**
     * Generated from protobuf field <code>repeated .PBItem insItems = 11;</code>
     * @param \PBItem[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setInsItems($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \PBItem::class);
        $this->insItems = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string hyperlink = 12;</code>
     * @return string
     */
    public function getHyperlink()
    {
        return $this->hyperlink;
    }

    /**
     * Generated from protobuf field <code>string hyperlink = 12;</code>
     * @param string $var
     * @return $this
     */
    public function setHyperlink($var)
    {
        GPBUtil::checkString($var, True);
        $this->hyperlink = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string linkContent = 13;</code>
     * @return string
     */
    public function getLinkContent()
    {
        return $this->linkContent;
    }

    /**
     * Generated from protobuf field <code>string linkContent = 13;</code>
     * @param string $var
     * @return $this
     */
    public function setLinkContent($var)
    {
        GPBUtil::checkString($var, True);
        $this->linkContent = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 source = 14;</code>
     * @return int
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Generated from protobuf field <code>uint32 source = 14;</code>
     * @param int $var
     * @return $this
     */
    public function setSource($var)
    {
        GPBUtil::checkUint32($var);
        $this->source = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 type = 15;</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Generated from protobuf field <code>uint32 type = 15;</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkUint32($var);
        $this->type = $var;

        return $this;
    }

}

