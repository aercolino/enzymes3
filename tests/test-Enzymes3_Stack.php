<?php

class Enzymes3_StackTest
        extends WP_UnitTestCase
{

    function test_peek_for_empty_store_is_null()
    {
        $s = new Enzymes3_Stack();
        $this->assertEquals(null, $s->peek());
        $this->assertEquals(null, $s->peek(2));
    }

    function test_pop_for_empty_store_is_null()
    {
        $s = new Enzymes3_Stack();
        $this->assertEquals(null, $s->pop());
        $this->assertEquals(null, $s->pop(2));
    }

    function test_push() {
        $s = new Enzymes3_Stack();
        $this->assertEquals(1, $s->push('hello'));
        $this->assertEquals(2, $s->push('world'));
    }

    function test_peek() {
        $s = new Enzymes3_Stack();
        $s->push('hello');
        $this->assertEquals(array('hello'), $s->peek());

        $s->push('world');
        $this->assertEquals(array('world'), $s->peek());

        $peek = $s->peek(2);
        $this->assertEquals(2, count($peek));
        $this->assertEquals(array('hello', 'world'), $peek);
    }

    function test_pop() {
        $s = new Enzymes3_Stack();
        $s->push('hello');
        $s->push('world');
        $this->assertEquals(array('world'), $s->pop());

        $s->push('world 2');
        $pop = $s->pop(2);
        $this->assertEquals(2, count($pop));
        $this->assertEquals(array('hello', 'world 2'), $pop);

        $this->assertEquals(1, $s->push('first'));
    }

}
