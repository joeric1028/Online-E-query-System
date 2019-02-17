<?php
	$config = array(
		'signup' => array(
			array(
				'field' => 'idnumber',
				'label' => 'ID Number',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			),
			array(
				'field' => 'firstname',
				'label' => 'First Name',
				'rules' => 'required'
			),
			array(
				'field' => 'middlename',
				'label' => 'Middle Name',
				'rules' => 'required'
			),
			array(
				'field' => 'lastname',
				'label' => 'Last Name',
				'rules' => 'required'
			),
			array(
				'field' => 'gender',
				'label' => 'Gender',
				'rules' => 'required'
			),
			array(
				'field' => 'type',
				'label' => 'User Type',
				'rules' => 'required'
			),
		),
		'email' => array(
			array(
				'field' => 'emailaddress',
				'label' => 'EmailAddress',
				'rules' => 'required|valid_email'
			),
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required|alpha'
			),
			array(
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'required'
			),
			array(
				'field' => 'message',
				'label' => 'MessageBody',
				'rules' => 'required'
			)
		),
		'login' => array(
			array(
				'field' => 'idnumber',
				'label' => 'ID Number',
				'rules' => 'required'
					),
					array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			)
		),
		'event' => array(
			array(
				'field' => 'eventname',
				'label' => 'Name',
				'rules' => 'required'
					),
					array(
				'field' => 'eventdate',
				'label' => 'Date of Occurance',
				'rules' => 'required'
			)
		)
	);
?>