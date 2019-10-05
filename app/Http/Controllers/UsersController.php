<?php

namespace App\Http\Controllers;

use App\structure;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class UsersController extends Controller
{

    public function edit($id)
    {
        $user= User::find($id);
        $structure= structure::find($user->struct_id);
        $structures = structure::where('id','<>',$user->struct_id)->get();
        return view('UpUser',compact('user','structures','structure'));
    }

    public function update(Request $request,$id)
    {
        //save data
        $user = User::where('id',$id)->first();
        if($user->struct_id != $request->input('struct_id'))
        {
            $struct1 = structure::find($user->struct_id);
            $struct1->nb_users = $struct1->nb_users - 1;
            $struct2 = structure::find($request->input('struct_id'));
            $struct2->nb_users = $struct2->nb_users + 1;
            $struct1->save();
            $struct2->save();
        }
            $user->update([
                'nom'=> $request->input('nom'),
                'prenom'=> $request->input('prenom'),
                'admin'=> $request->input('Admin'),
                'struct_id'=> $request->input('struct_id'),
            ]);
        return redirect('/AcceuilAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->Admin == 1)
        {
            $nb = User::where('Admin',1)->get()->count();
            if($nb>1)
            {
                $struct1 = structure::find($user->struct_id);
                $struct1->nb_users = $struct1->nb_users - 1;
                $struct1->save();
                Auth::logout();
                $user->delete();
                return redirect('/');
            }
            else
            {
                return redirect()->back()->with("Erreur","Dernier compte administrateur , Impossible de le supprimer");
            }

        }
        else
        {
            $struct1 = structure::find($user->struct_id);
            $struct1->nb_users = $struct1->nb_users - 1;
            $user->delete();
            $struct1->save();
            return redirect('/AcceuilAdmin/');
        }
    }
}
