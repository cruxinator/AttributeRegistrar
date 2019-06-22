<?php


namespace Cruxinator\AttributeRegistrar\Tests\Models\Conerns;


trait ValueDoubler
{

    protected function setAttributeValueDoubler($key, $value)
    {
        if (in_array($key, $this->doubleDown)) {
            parent::setAttribute($key, $value / 2);
            return true;
        }
        return false;
    }
    protected function getAttributeValueDoubler($key)
    {
        if (in_array($key, $this->doubleUp)) {
            return parent::getAttribute($key) * 2;
        }
        return null;
    }
}
