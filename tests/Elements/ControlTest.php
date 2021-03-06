<?php

namespace Isaac\BulmaForm\Elements;

use AdamWathan\Form\FormBuilder;
use PHPUnit_Framework_TestCase;

class ControlTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->builder = new FormBuilder;
    }

    /** @test */
    function can_render_basic_form_control()
    {
        $label = $this->builder->label('Email');
        $text = $this->builder->text('email');
        $formGroup = new Control($label, $text);
        $expected = '<label>Email</label><p class="control"><input type="text" name="email"></p>';
        $result = $formGroup->render();
        $this->assertEquals($expected, $result);
    }

    /** @test */
    function can_render_with_placeholder()
    {
        $label = $this->builder->label('Email');
        $text = $this->builder->text('email');
        $formGroup = new Control($label, $text);
        $formGroup->placeholder('email address');

        $expected = '<label>Email</label><p class="control"><input type="text" name="email" placeholder="email address"></p>';
        $result = $formGroup->render();
        $this->assertEquals($expected, $result);
    }

    /** @test */
    function can_render_with_value()
    {
        $label = $this->builder->label('Email');
        $text = $this->builder->text('email');
        $formGroup = new Control($label, $text);
        $formGroup->value('example@example.com');

        $expected = '<label>Email</label><p class="control"><input type="text" name="email" value="example@example.com"></p>';
        $result = $formGroup->render();
        $this->assertEquals($expected, $result);
    }

    /** @test */
    function can_render_with_default_value()
    {
        $label = $this->builder->label('Email');
        $text = $this->builder->text('email');
        $formGroup = new Control($label, $text);
        $formGroup->defaultValue('example@example.com');

        $expected = '<label>Email</label><p class="control"><input type="text" name="email" value="example@example.com"></p>';
        $result = $formGroup->render();
        $this->assertEquals($expected, $result);
    }

    /** @test */
    function can_default_value_not_applied_if_already_a_value()
    {
        $label = $this->builder->label('Email');
        $text = $this->builder->text('email');
        $formGroup = new Control($label, $text);
        $formGroup->value('test@test.com')->defaultValue('example@example.com');

        $expected = '<label>Email</label><p class="control"><input type="text" name="email" value="test@test.com"></p>';
        $result = $formGroup->render();
        $this->assertEquals($expected, $result);
    }

    /** @test */
    function can_render_with_help_block()
    {
        $label = $this->builder->label('Email');
        $text = $this->builder->text('email');
        $formGroup = new Control($label, $text);
        $formGroup->helpBlock('Email is required.');

        $expected = '<label>Email</label><p class="control"><input type="text" name="email"><span class="help">Email is required.</span></p>';
        $result = $formGroup->render();
        $this->assertEquals($expected, $result);
    }
}