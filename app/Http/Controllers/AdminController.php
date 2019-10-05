<?php

namespace App\Http\Controllers;

use App\Exports\AppsExport;
use App\Exports\StructsExport;
use App\Http\Requests\UserRequest;
use App\structure;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if(Auth::user()->Admin == 0)
        {
            abort(404);
        }
        $users = DB::table('users as U')
            ->join('structures as S' , 'S.id' , '=','U.struct_id')
            ->select ('U.id',  'U.username', 'U.nom', 'U.prenom', 'S.nom as Str','U.Admin')
            ->get();

        $structures = structure::all();

        $applications = DB::select(DB::raw('SELECT applications.* , U.nom as username ,U.prenom ,S.nom as Str FROM (SELECT id ,max(DDM) as dateMAJ FROM applications Group By id) as lastapp
         INNER JOIN applications ON applications.id = lastapp.id AND applications.DDM = lastapp.dateMAJ 
         JOIN users as U On applications.user_id = U.id
         Join structures as S On applications.struct_id = S.id'));
        return view('AcceuilAdmin',compact('users','structures','applications'));
    }

    public  function Createuser(UserRequest $request)
    {
        if(Auth::user()->Admin == 0)
        {
            abort(404);
        }
        User::create([
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'Admin' => $request['Admin'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'struct_id' => $request['struct_id'],
        ]);
        $struct = structure::find($request['struct_id']);
        $struct->nb_users += 1;
        $struct->save();
        return redirect()->back();
    }

    public function Exportusers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function Exportapps()
    {
        return Excel::download(new AppsExport, 'apps.xlsx');
    }

    public function Exportstructs()
    {
        return Excel::download(new StructsExport, 'structures.xlsx');
    }

}
