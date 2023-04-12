<?php namespace Seditio\contactform\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Redirect;

class ContactForm extends ComponentBase{
  public function componentDetails(){
      return [
          'name' => 'Contact Form',
          'Description' => 'Simple contact'
      ];
  }

  public function onSend(){
    $validator = Validator::make(
      [
          'fname' => Input::get('first_name'),
          'lname' => Input::get('last_name'),
          'cname' => Input::get('company_name'),
          'cno' => Input::get('contact_no'),
          'email' => Input::get('email')
      ],
      [
          'fname' => 'required',
          'lname' => 'required',
          'cno' => 'required',
          'cname' => 'required',
          'email' => 'required|email'
      ]
    );

    if($validator->fails()){

      return false;

    }else{
      $formType = Input::get('formType');      
      $fields = [
        'fname' => Input::get('first_name'),
        'lname' => Input::get('last_name'),
        'cname' => Input::get('company_name'),
        'cno' => Input::get('contact_no'),
        'email' => Input::get('email')
      ];

      switch($formType){
        case'trial':
          $this->sendMail($fields, '_trial', $fields['email'],'Thank you for your interest in ManagedPMO!');
          $this->sendMail($fields, 'auto-reply-trial', 'aileen@seditio.ie','A customer is interested at our Trial');
          break;
        case'subscribe':
          $this->sendMail($fields, '_subscribe', $fields['email'],'Thank you for your interest in ManagedPMO!');
          $this->sendMail($fields, 'auto-reply-subscribe', 'aileen@seditio.ie','A customer is interested at our Subscription plans');
          break;
        default:
          $this->sendMail($fields, '_contact-us', $fields['email'],'Thank you for your interest in ManagedPMO!');
          $this->sendMail($fields, 'auto-reply-contact-us', 'aileen@seditio.ie','A customer has requested contact');
          break;    
      }
    }   
  }

  public function sendMail($fields, $template, $to, $subject) {
    Mail::send('seditio.contact::mail.'. $template, $fields, function($message) use ($to, $subject) {
      $message->to($to);
      $message->subject($subject);
    });
  }
}