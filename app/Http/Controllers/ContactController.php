<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Group;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
  /**
   * Initialise une instance du controller.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
    * Affiche la vue de l'ensemble des contacts de l'utilisateur.
    *
    * @param  int  $id
    * @return Response
    */
  function index ()
  {
    $contacts = Contact::where('user_id', '=', Auth::id())->get();

    return view('contact.index', [
      'contacts' => $contacts
    ]);
  }

  /**
    * Affiche la vue d'ajout de contact.
    *
    * @return Response
    */
  function add ()
  {
      $groups = Group::where('user_id', '=', Auth::id())->get();

      return view('contact.add', ['groups' => $groups]);
  }

  /**
    * Enregistre un nouveau contact.
    *
    * @return Response
    */
  function store (Request $request)
  {
    $contact = Contact::create([
      'name' => $request->contactName,
      'phone_number' => $request->phoneNumber,
      'user_id' => Auth::id(),
      'group_id' => $request->contactGroup
    ]);

    return back();
  }

  /**
    * Affiche la vue de modification d'un contact.
    *
    * @param  int  $id
    * @return Response
    */
  function edit ($id)
  {
    $contact = Contact::find($id);
    $groups = Group::where('user_id', '=', Auth::id())->get();

    return view('contact.edit', [
      'contact'      => $contact,
      'groups'       => $groups
    ]);
  }

  /**
    * Affiche la vue de modification d'un contact.
    *
    * @param  Request  $request
    * @param  int  $id
    * @return Response
    */
  function update (Request $request, $id)
  {
    Contact::where('id', '=', $id)
      ->update([
        'name' => $request->contactName,
        'phone_number' => $request->phoneNumber,
        'group_id' => $request->contactGroup
      ]);

    return back();
  }


}
