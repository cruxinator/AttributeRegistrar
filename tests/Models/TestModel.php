<?php


namespace Cruxinator\AttributeRegistrar\Tests\Models;


use Cruxinator\AttributeRegistrar\Models\Conerns\HasAttributeRegistrar;
use Cruxinator\AttributeRegistrar\Tests\Models\Conerns\StringReverser;
use Cruxinator\AttributeRegistrar\Tests\Models\Conerns\ValueDoubler;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use HasAttributeRegistrar, StringReverser,ValueDoubler;

    protected $reverseString = ["reverse1", "reverseAndHalf"];

    protected $halfString = ["half1", "reverseAndHalf"];

    protected $doubleDown = ["doubleDown1", "doubleDownAndUp"];

    protected $doubleUp =["doubleUp1", "doubleDownAndUp"];
}
