<?php


namespace Cruxinator\AttributeRegistrar\Tests\Models\Conerns;


trait StringReverser
{
    protected function setAttributeStringReverser($key, $value)
    {
        if (in_array($key, $this->reverseString)) {
            parent::setAttribute($key, strrev($value));
            return true;
        }
        return false;
    }
    protected function getAttributeStringReverser($key)
    {
        if (in_array($key, $this->halfString)) {
            $str = parent::getAttribute($key);
            return substr($str,0,strlen($str)/2);
        }
        return null;
    }
}
