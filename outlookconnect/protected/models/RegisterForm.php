<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegisterForm extends CFormModel {
	public $firstname;
	public $surname;
	public $knownas;
	public $name;
	public $password;
	//public $passwordconfirm;
	public $email;
	public $user;

	public function rules()
	{
		return array(
				array('name, password, email,firstname,surname', 'required'),
				array('knownas','type','type'=>'string'),
				array('email','email'),
				array('name', 'length', 'min'=>3, 'max'=>12),
				array('password', 'length', 'min'=>7)
		);
	}

	public function register() {
		$this->user = new User;
		$user=$this->user;
		$user->name=$this->name;
		$user->password=$this->password;
		$user->email=$this->email;
		$user->firstname=$this->firstname;
		$user->surname=$this->surname;
		$user->knownas=$this->knownas;
		$user->type="user";
		if (!$user->save()) {
			$this->addErrors($user->errors);
			return false;
		}
		return true;
	}

	public function authenticate() {
		return true;
	}
}