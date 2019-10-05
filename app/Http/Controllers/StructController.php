<?php

namespace App\Http\Controllers;

use App\Http\Requests\StructRequest;
use App\structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class StructController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Update(StructRequest $request)
    {
       $struct = structure::find($request['user_id']);
       $struct->nom = $request['nom'];
       $struct->save();
       return redirect()->back();
    }

    public function Delete(Request $request)
    {
        $struct = structure::find($request['struct_id']);
        if($struct->nb_app >0 || $struct->nb_users >0)
        {
            return redirect()->back()->with('message', 'Veillez verifier que la structure ne contient aucune application et utilistsateur');
        }
        $struct->delete();
        return redirect()->back()->with('message', 'Structure Supprime avec succes');

    }
    public function Create(StructRequest $request)
    {
        structure::create([
            'nom' => $request['nom'],
        ]);
        return redirect()->back()->with('message', 'Structure Cree avec succes');
    }

    public function getusers($id)
    {
        $users = DB::table('users')->where('struct_id','=', $id)->get();
        $userData['data'] =  $users ;

        echo json_encode($userData);
        return;
    }
}
