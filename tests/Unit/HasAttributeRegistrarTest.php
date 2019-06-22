<?php

namespace Cruxinator\AttributeRegistrar\Tests\Unit;


use Cruxinator\AttributeRegistrar\Tests\Models\TestModel;
use Cruxinator\AttributeRegistrar\Tests\TestCase;


class HasAttributeRegistrarTest extends TestCase
{

    public function testGetSetAttribute1()
    {
          $model = new TestModel();
          $model->unknownAttribute = "test";
          $this->assertSame("test", $model->unknownAttribute);
          $model->reverse1 = "abc";
          $this->assertSame("cba", $model->reverse1);

          $model->reverseAndHalf = "abcd";
          $allAttributes = $model->getAttributes();
          $this->assertSame("dcba", $allAttributes["reverseAndHalf"]);
          $this->assertSame("dc", $model->reverseAndHalf);
        $model->half1 = "abcd";
          $this->assertSame("ab", $model->half1);

        $model->doubleDown1 = 4;
        $this->assertSame(2, $model->doubleDown1);

        $model->doubleUp1 = 4;
        $this->assertSame(8, $model->doubleUp1);

        $model->doubleDownAndUp = 8;
        $allAttributes = $model->getAttributes();
        $this->assertSame(4, $allAttributes["doubleDownAndUp"]);
        $this->assertSame(8, $model->doubleDownAndUp);


    }
}
