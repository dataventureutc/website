<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class NewsletterController extends Controller
{
  public function add(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => 'required|string|email',
    ]);

    if ($validator->fails())
      return response()->error("Mauvais inputs", 422, $validator->errors());

    $exists = DB::table('newsletter')->where('email', $request->input('email'))->count();
    if($exists)
      return response()->error("L'adresse email existe déjà", 409);

    try {
      DB::table('newsletter')->insert(['email' => $request->input('email')]);
    } catch(\Exception $e) {
      return response()->error('Erreur interne, impossible d\'enregistrer l\'adresse email.', 500);
    }

    return response()->success();
  }
}
