<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Contact;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
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
    * Affiche la vue de l'ensemble des groupes de l'utilisateur.
    *
    * @param  int  $id
    * @return Response
    */
    public function index()
    {
      $groups = Group::where('user_id', '=', Auth::id())->get();
      return view('group.index', ['groups' => $groups]);
    }

    /**
    * Affiche la vue d'ajout de contact.
    *
    * @return Response
    */
    function add ()
    {
        return view('group.add');
    }

    /**
      * Enregistre un nouveau contact.
      *
      * @return Response
      */
    function store (Request $request)
    {
      Group::create([
        'name' => $request->groupName,
        'user_id' => Auth::id()
      ]);
      return back();
    }

    /**
      * Affiche la vue de modification d'un contact.
      *
      * @param  int  $id
      * @return Response
      */
    public function edit($id)
    {
      $group = Group::find($id);
      $contacts = Contact::where('group_id', '=', $id)->get();

      return view('group.edit', [
        'group'    => $group,
        'contacts' => $contacts
      ]);
    }

    /**
      * Affiche la vue de modification d'un contact.
      *
      * @param  Request  $request
      * @param  int  $id
      * @return Response
      */
    public function update(Request $request, $id)
    {
      Group::where('id', '=', $id)
        ->update([
          'name' => $request->groupName
        ]);

      return back();
    }

}
