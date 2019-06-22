<?php


namespace Cruxinator\AttributeRegistrar\Models\Conerns;

use Illuminate\Database\Eloquent\Model;

/**
 * Trait HasAttributeRegistrar
 * @package Cruxinator\AttributeRegistrar\Models\Conerns
 *
 * @mixin Model
 */
trait HasAttributeRegistrar
{
    private static $_getAttributeMethods = [];
    private static $_setAttributeMethods = [];
    public static function bootHasAttributeRegistrar()
    {
        $class = static::class;
        foreach (class_uses_recursive($class) as $trait) {
            $getMethod = 'getAttribute' . class_basename($trait);
            $setMethod = 'setAttribute' . class_basename($trait);
            if (method_exists($class, $getMethod)) {
                static::$_getAttributeMethods[] = $getMethod;

            }
            if (method_exists($class, $setMethod)) {
                static::$_setAttributeMethods[] = $setMethod;
            }
        }

    }
    /**
     * Get an attribute from the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        foreach(static::$_getAttributeMethods as $attributeGetter){
            $value = $this->$attributeGetter($key);
            if($value !== null){
                return $value;
            }
        }
        return parent::getAttribute($key);
    }
    /**
     * Set a given attribute on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    public function setAttribute($key, $value)
    {
        foreach(static::$_setAttributeMethods as $attributeSetter) {
            if($this->$attributeSetter($key, $value)){
                return $this;
            }
        }
        return parent::setAttribute($key, $value);
    }
}