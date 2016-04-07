<?php

require_once 'bootstrap.php';

$form = new Form(array('subject' => 'Life\'s A Stitch Customer Contact'));

$form->addField('name', 'text', array(
  'pattern'    => array(
    '/^[^0-9+!@#$%^*\\/=\(\)\{\}\[\]]*$/',
    'error_message' => 'Name cannot contain numbers or any of the following 
                        special characters: !@#$+%*=\\/^(){}[]'),
  'required'   => array(
    true,
    'error_message' => 'Name is a required field'
  ),
  'min_length' => 2,
  'max_length' => 50
));

$form->addField('email', 'text'/*'email'*/, array(
  'format'     => 'email_address',
  'required'   => true
));

$form->addField('message', 'textarea', array(
  'required'    => array(
    true,
    'error_message' => 'Please enter a message'),
  'min_length'  => 10
));

$form->addField(
  'antispam', 
  'text', 
  array(
    'blank' => array(
      true, 
      'on_failure' => function() {
        header('Location: thankyou.php');
      }
    )
  )
);


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $form->process($_POST);
  
  if($form->isValid())
  {
    $form->send('zlifes.a.stitch@gmail.com');
    header('Location: thankyou.php');
    //echo $form->render('thankyou.tpl.php');
    exit();
  }
  
}

echo $form->render('contact.tpl.php');