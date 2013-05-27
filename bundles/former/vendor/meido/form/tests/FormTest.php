<?php

use Symfony\Component\Routing\RouteCollection;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;
use Meido\Form\Form;

class FormTest extends PHPUnit_Framework_TestCase {

	/**
	 * The form instance
	 */
	protected $form;

	/**
	 * Setup test environment.
	 */
	public function setUp()
	{
		$url = new UrlGenerator(new RouteCollection, Request::create('/', 'GET'));
		$this->form = new Form($url);
	}

	/**
	 * Test the compilation of opening a form.
	 */
	public function testOpeningForm()
	{
		$form1 = $this->form->open('foobar', 'GET');
		$form2 = $this->form->open('foobar', 'POST');
		$form3 = $this->form->open('foobar', 'PUT');
		$form4 = $this->form->open('foobar', 'DELETE');

		$this->assertEquals('<form method="GET" action="http://localhost/foobar" accept-charset="utf-8">', $form1);
		$this->assertEquals('<form method="POST" action="http://localhost/foobar" accept-charset="utf-8">', $form2);
		$this->assertEquals('<form method="POST" action="http://localhost/foobar" accept-charset="utf-8"><input type="hidden" name="_method" value="PUT" />', $form3);
		$this->assertEquals('<form method="POST" action="http://localhost/foobar" accept-charset="utf-8"><input type="hidden" name="_method" value="DELETE" />', $form4);
	}

	/**
	 * Test the compilation of opening a secure form.
	 */
	public function testOpeningSecureForm()
	{
		$form1 = $this->form->openSecure('foobar', 'GET');
		$form2 = $this->form->openSecure('foobar', 'POST');
		$form3 = $this->form->openSecure('foobar', 'PUT');
		$form4 = $this->form->openSecure('foobar', 'DELETE');

		$this->assertEquals('<form method="GET" action="https://localhost/foobar" accept-charset="utf-8">', $form1);
		$this->assertEquals('<form method="POST" action="https://localhost/foobar" accept-charset="utf-8">', $form2);
		$this->assertEquals('<form method="POST" action="https://localhost/foobar" accept-charset="utf-8"><input type="hidden" name="_method" value="PUT" />', $form3);
		$this->assertEquals('<form method="POST" action="https://localhost/foobar" accept-charset="utf-8"><input type="hidden" name="_method" value="DELETE" />', $form4);
	}

	/**
	 * Test the compilation of opening a form for a file
	 */
	public function testOpeningFormForFile()
	{
		$form1 = $this->form->openForFiles('foobar', 'GET');
		$form2 = $this->form->openForFiles('foobar', 'POST');
		$form3 = $this->form->openForFiles('foobar', 'PUT');
		$form4 = $this->form->openForFiles('foobar', 'DELETE');

		$this->assertEquals('<form enctype="multipart/form-data" method="GET" action="http://localhost/foobar" accept-charset="utf-8">', $form1);
		$this->assertEquals('<form enctype="multipart/form-data" method="POST" action="http://localhost/foobar" accept-charset="utf-8">', $form2);
		$this->assertEquals('<form enctype="multipart/form-data" method="POST" action="http://localhost/foobar" accept-charset="utf-8"><input type="hidden" name="_method" value="PUT" />', $form3);
		$this->assertEquals('<form enctype="multipart/form-data" method="POST" action="http://localhost/foobar" accept-charset="utf-8"><input type="hidden" name="_method" value="DELETE" />', $form4);
	}

	/**
	 * Test the compilation of opening a secure form for a file
	 */
	public function testOpeningSecureFormForFile()
	{
		$form1 = $this->form->openSecureForFiles('foobar', 'GET');
		$form2 = $this->form->openSecureForFiles('foobar', 'POST');
		$form3 = $this->form->openSecureForFiles('foobar', 'PUT');
		$form4 = $this->form->openSecureForFiles('foobar', 'DELETE');

		$this->assertEquals('<form enctype="multipart/form-data" method="GET" action="https://localhost/foobar" accept-charset="utf-8">', $form1);
		$this->assertEquals('<form enctype="multipart/form-data" method="POST" action="https://localhost/foobar" accept-charset="utf-8">', $form2);
		$this->assertEquals('<form enctype="multipart/form-data" method="POST" action="https://localhost/foobar" accept-charset="utf-8"><input type="hidden" name="_method" value="PUT" />', $form3);
		$this->assertEquals('<form enctype="multipart/form-data" method="POST" action="https://localhost/foobar" accept-charset="utf-8"><input type="hidden" name="_method" value="DELETE" />', $form4);
	}

	/**
	 * Test the compilation of closing a form.
	 */
	public function testClosingForm()
	{
		$this->assertEquals('</form>', $this->form->close());
	}

	/**
	 * Test the compilation of form label
	 */
	public function testFormLabel()
	{
		$form1 = $this->form->label('foo', 'Foobar');
		$form2 = $this->form->label('foo', 'Foobar', array('class' => 'sample-class'));

		$this->assertEquals('<label for="foo">Foobar</label>', $form1);
		$this->assertEquals('<label for="foo" class="sample-class">Foobar</label>', $form2);
	}

	/**
	 * Test the compilation of form text
	 */
	public function testFormText()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->input('text', 'foo');
		$form2 = $this->form->text('foo');
		$form3 = $this->form->text('foo', 'foobar');
		$form4 = $this->form->text('foo', null, array('class' => 'span2'));

		$this->assertEquals('<input type="text" name="foo" id="foo" />', $form1);
		$this->assertEquals($form1, $form2);
		$this->assertEquals('<input type="text" name="foo" value="foobar" id="foo" />', $form3);
		$this->assertEquals('<input class="span2" type="text" name="foo" id="foo" />', $form4);
	}

	/**
	 * Test the compilation of form password
	 */
	public function testFormPassword()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->input('password', 'foo');
		$form2 = $this->form->password('foo');
		$form3 = $this->form->password('foo', array('class' => 'span2'));

		$this->assertEquals('<input type="password" name="foo" id="foo" />', $form1);
		$this->assertEquals($form1, $form2);
		$this->assertEquals('<input class="span2" type="password" name="foo" id="foo" />', $form3);
	}

	/**
	 * Test the compilation of form hidden
	 */
	public function testFormHidden()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->input('hidden', 'foo');
		$form2 = $this->form->hidden('foo');
		$form3 = $this->form->hidden('foo', 'foobar');
		$form4 = $this->form->hidden('foo', null, array('class' => 'span2'));

		$this->assertEquals('<input type="hidden" name="foo" id="foo" />', $form1);
		$this->assertEquals($form1, $form2);
		$this->assertEquals('<input type="hidden" name="foo" value="foobar" id="foo" />', $form3);
		$this->assertEquals('<input class="span2" type="hidden" name="foo" id="foo" />', $form4);
	}

	/**
	 * Test the compilation of form search
	 */
	public function testFormSearch()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->input('search', 'foo');
		$form2 = $this->form->search('foo');
		$form3 = $this->form->search('foo', 'foobar');
		$form4 = $this->form->search('foo', null, array('class' => 'span2'));

		$this->assertEquals('<input type="search" name="foo" id="foo" />', $form1);
		$this->assertEquals($form1, $form2);
		$this->assertEquals('<input type="search" name="foo" value="foobar" id="foo" />', $form3);
		$this->assertEquals('<input class="span2" type="search" name="foo" id="foo" />', $form4);
	}

	/**
	 * Test the compilation of form email
	 */
	public function testFormEmail()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->input('email', 'foo');
		$form2 = $this->form->email('foo');
		$form3 = $this->form->email('foo', 'foobar');
		$form4 = $this->form->email('foo', null, array('class' => 'span2'));

		$this->assertEquals('<input type="email" name="foo" id="foo" />', $form1);
		$this->assertEquals($form1, $form2);
		$this->assertEquals('<input type="email" name="foo" value="foobar" id="foo" />', $form3);
		$this->assertEquals('<input class="span2" type="email" name="foo" id="foo" />', $form4);
	}

	/**
	 * Test the compilation of form telephone
	 */
	public function testFormTelephone()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->input('tel', 'foo');
		$form2 = $this->form->telephone('foo');
		$form3 = $this->form->telephone('foo', 'foobar');
		$form4 = $this->form->telephone('foo', null, array('class' => 'span2'));

		$this->assertEquals('<input type="tel" name="foo" id="foo" />', $form1);
		$this->assertEquals($form1, $form2);
		$this->assertEquals('<input type="tel" name="foo" value="foobar" id="foo" />', $form3);
		$this->assertEquals('<input class="span2" type="tel" name="foo" id="foo" />', $form4);
	}

	/**
	 * Test the compilation of form url
	 */
	public function testFormUrl()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->input('url', 'foo');
		$form2 = $this->form->url('foo');
		$form3 = $this->form->url('foo', 'foobar');
		$form4 = $this->form->url('foo', null, array('class' => 'span2'));

		$this->assertEquals('<input type="url" name="foo" id="foo" />', $form1);
		$this->assertEquals($form1, $form2);
		$this->assertEquals('<input type="url" name="foo" value="foobar" id="foo" />', $form3);
		$this->assertEquals('<input class="span2" type="url" name="foo" id="foo" />', $form4);
	}

	/**
	 * Test the compilation of form number
	 */
	public function testFormNumber()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->input('number', 'foo');
		$form2 = $this->form->number('foo');
		$form3 = $this->form->number('foo', 'foobar');
		$form4 = $this->form->number('foo', null, array('class' => 'span2'));

		$this->assertEquals('<input type="number" name="foo" id="foo" />', $form1);
		$this->assertEquals($form1, $form2);
		$this->assertEquals('<input type="number" name="foo" value="foobar" id="foo" />', $form3);
		$this->assertEquals('<input class="span2" type="number" name="foo" id="foo" />', $form4);
	}

	/**
	 * Test the compilation of form date
	 */
	public function testFormDate()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->input('date', 'foo');
		$form2 = $this->form->date('foo');
		$form3 = $this->form->date('foo', 'foobar');
		$form4 = $this->form->date('foo', null, array('class' => 'span2'));

		$this->assertEquals('<input type="date" name="foo" id="foo" />', $form1);
		$this->assertEquals($form1, $form2);
		$this->assertEquals('<input type="date" name="foo" value="foobar" id="foo" />', $form3);
		$this->assertEquals('<input class="span2" type="date" name="foo" id="foo" />', $form4);
	}

	/**
	 * Test the compilation of form file
	 */
	public function testFormFile()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->input('file', 'foo');
		$form2 = $this->form->file('foo');
		$form3 = $this->form->file('foo', array('class' => 'span2'));

		$this->assertEquals('<input type="file" name="foo" id="foo" />', $form1);
		$this->assertEquals($form1, $form2);
		$this->assertEquals('<input class="span2" type="file" name="foo" id="foo" />', $form3);
	}

	/**
	 * Test the compilation of form textarea
	 */
	public function testFormTextarea()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->textarea('foo');
		$form2 = $this->form->textarea('foo', 'foobar');
		$form3 = $this->form->textarea('foo', null, array('class' => 'span2'));

		$this->assertEquals('<textarea name="foo" id="foo" rows="10" cols="50"></textarea>', $form1);
		$this->assertEquals('<textarea name="foo" id="foo" rows="10" cols="50">foobar</textarea>', $form2);
		$this->assertEquals('<textarea class="span2" name="foo" id="foo" rows="10" cols="50"></textarea>', $form3);
	}

	/**
	 * Test the compilation of form select
	 */
	public function testFormSelect()
	{
		$select1 = array(
			'foobar' => 'Foobar',
			'hello'  => 'Hello World',
		);

		$select2 = array(
			'foo' => array(
				'foobar' => 'Foobar',
			),
			'hello'  => 'Hello World',
		);

		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->select('foo');
		$form2 = $this->form->select('foo', $select1, 'foobar');
		$form3 = $this->form->select('foo', $select1, null, array('class' => 'span2'));
		$form4 = $this->form->select('foo', $select2, 'foobar');

		$this->assertEquals('<select id="foo" name="foo"></select>', $form1);
		$this->assertEquals('<select id="foo" name="foo"><option value="foobar" selected="selected">Foobar</option><option value="hello">Hello World</option></select>', $form2);
		$this->assertEquals('<select class="span2" id="foo" name="foo"><option value="foobar">Foobar</option><option value="hello">Hello World</option></select>', $form3);
		$this->assertEquals('<select id="foo" name="foo"><optgroup label="foo"><option value="foobar" selected="selected">Foobar</option></optgroup><option value="hello">Hello World</option></select>', $form4);
	}

	/**
	 * Test the compilation of form checkbox
	 */
	public function testFormCheckbox()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->input('checkbox', 'foo');
		$form2 = $this->form->checkbox('foo');
		$form3 = $this->form->checkbox('foo', 'foobar', true);
		$form4 = $this->form->checkbox('foo', 'foobar', false, array('class' => 'span2'));

		$this->assertEquals('<input type="checkbox" name="foo" id="foo" />', $form1);
		$this->assertEquals('<input id="foo" type="checkbox" name="foo" value="1" />', $form2);
		$this->assertEquals('<input checked="checked" id="foo" type="checkbox" name="foo" value="foobar" />', $form3);
		$this->assertEquals('<input class="span2" id="foo" type="checkbox" name="foo" value="foobar" />', $form4);
	}

	/**
	 * Test the compilation of form date
	 */
	public function testFormRadio()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->input('radio', 'foo');
		$form2 = $this->form->radio('foo');
		$form3 = $this->form->radio('foo', 'foobar', true);
		$form4 = $this->form->radio('foo', 'foobar', false, array('class' => 'span2'));

		$this->assertEquals('<input type="radio" name="foo" id="foo" />', $form1);
		$this->assertEquals('<input id="foo" type="radio" name="foo" value="foo" />', $form2);
		$this->assertEquals('<input checked="checked" id="foo" type="radio" name="foo" value="foobar" />', $form3);
		$this->assertEquals('<input class="span2" id="foo" type="radio" name="foo" value="foobar" />', $form4);
	}

	/**
	 * Test the compilation of form submit
	 */
	public function testFormSubmit()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->submit('foo');
		$form2 = $this->form->submit('foo', array('class' => 'span2'));

		$this->assertEquals('<input type="submit" value="foo" />', $form1);
		$this->assertEquals('<input class="span2" type="submit" value="foo" />', $form2);
	}

	/**
	 * Test the compilation of form reset
	 */
	public function testFormReset()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->reset('foo');
		$form2 = $this->form->reset('foo', array('class' => 'span2'));

		$this->assertEquals('<input type="reset" value="foo" />', $form1);
		$this->assertEquals('<input class="span2" type="reset" value="foo" />', $form2);
	}

	/**
	 * Test the compilation of form image
	 */
	public function testFormImage()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->image('foo/bar', 'foo');
		$form2 = $this->form->image('foo/bar', 'foo', array('class' => 'span2'));
		$form3 = $this->form->image('http://google.com/foobar', 'foobar');

		$this->assertEquals('<input src="http://localhost/foo/bar" type="image" name="foo" id="foo" />', $form1);
		$this->assertEquals('<input class="span2" src="http://localhost/foo/bar" type="image" name="foo" id="foo" />', $form2);
		$this->assertEquals('<input src="http://google.com/foobar" type="image" name="foobar" />', $form3);

	}

	/**
	 * Test the compilation of form button
	 */
	public function testFormButton()
	{
		$label1 = $this->form->label('foo', 'FooBar');
		$form1 = $this->form->button('foo');
		$form2 = $this->form->button('foo', array('class' => 'span2'));

		$this->assertEquals('<button>foo</button>', $form1);
		$this->assertEquals('<button class="span2">foo</button>', $form2);
	}

}