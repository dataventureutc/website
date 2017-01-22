<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Mail;
use App\Mail\Contact;

class ContactController extends Controller
{
  public function send(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'first_name' => 'required|string',
      'last_name' => 'required|string',
      'email' => 'required|string|email',
      'message' => 'required|string',
    ]);

    if ($validator->fails())
      return response()->error("Mauvais inputs", 422, $validator->errors());

    try {

      $contact = new Contact($request->input('first_name')." ".$request->input('last_name'), $request->input('email'), $request->input('message'));
      Mail::to(env('MAIL_USERNAME'))->send($contact);

    } catch(\Exception $e) {
      return response()->error("Erreur interne, impossible d'envoyer l'email.", 500);
    }

    return response()->success();
  }
}
