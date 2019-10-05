<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests\ApplicationRequest;
use App\structure;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{   public function edit(){
    return view('NewApp');
    }

    public  function CreateNew(Request $request){
        $app=DB::table('applications')
            ->max('id');
        $appp=Application::where('nom','=',$request['nom'])->first();
        if($appp== null){
            Application::insert([
                'id'=>$app+1,
                'nom' => $request['nom'],
                'Nver' => $request['Nver'],
                'editeur' => $request['editeur'],
                'DMP' => $request['DMP'],
                'DDM' => Carbon::now()->addHour(),
                'nomserveur' => $request['nomserveur'],
                'adressIP' => $request['adressIP'],
                'OS' => $request['OS'],
                'verOS' => $request['verOS'],
                'DB' => $request['DB'],
                'verDB' => $request['verDB'],
                'typeapp' => $request['typeapp'],
                'adsys' => $request['adsys'],
                'adbd' => $request['adbd'],
                'user_id' => Auth::user()->id,
                'admetier' => $request['admetier'],
                'struct_id' => Auth::user()->struct_id,
                'description' => $request['description']
            ]);
            $struct= structure::where('id','=',Auth::user()->struct_id)->first();
            $struct->nb_app=$struct->nb_app+1;
            $struct->save();
            return redirect('/');}
        return redirect()->back()->with("Erreur","le nom de l'application existe déja, veuillez choisir un autre nom.");

    }

    public  function Create(Request $request,$id)
    {
        $Application = Application::where('id', '=', $id)
            ->orderBy('DDM', 'desc')
            ->first();
        $boolean = true;
        if ($Application->nom == $request['nom']) {
            if ($Application->Nver == $request['Nver']) {
                if ($Application->editeur == $request['editeur']) {
                    if ($Application->DMP == $request['DMP']) {
                        if ($Application->nomserveur == $request['nomserveur']) {
                            if ($Application->adressIP == $request['adressIP']) {
                                if ($Application->OS == $request['OS']) {
                                    if ($Application->verOS == $request['verOS']) {
                                        if ($Application->DB == $request['DB']) {
                                            if ($Application->verDB == $request['verDB']) {
                                                if ($Application->typeapp == $request['typeapp']) {
                                                    if ($Application->adsys == $request['adsys']) {
                                                        if ($Application->adbd == $request['adbd']) {
                                                            if ($Application->admetier == $request['admetier']) {
                                                                if ($Application->description == $request['description']) {
                                                                    $boolean = false;

                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        if ($boolean) {
            $app = Application::where('nom', '=', $request['nom'])->first();

            if ($app == null or $app->id == $id or $Application->nom == $request['nom']) {
                Application::create([
                    'id' => $id,
                    'nom' => $request['nom'],
                    'Nver' => $request['Nver'],
                    'editeur' => $request['editeur'],
                    'DMP' => $request['DMP'],
                    'DDM' => Carbon::now()->addHour(),
                    'nomserveur' => $request['nomserveur'],
                    'adressIP' => $request['adressIP'],
                    'OS' => $request['OS'],
                    'verOS' => $request['verOS'],
                    'DB' => $request['DB'],
                    'verDB' => $request['verDB'],
                    'typeapp' => $request['typeapp'],
                    'adsys' => $request['adsys'],
                    'adbd' => $request['adbd'],
                    'user_id' => Auth::user()->id,
                    'admetier' => $request['admetier'],
                    'struct_id' => Auth::user()->struct_id,
                    'description' => $request['description']
                ]);

                return redirect()->back();
            } else {
                return redirect()->back()->with("Erreur", "le nom de l'application existe déja, veuillez choisir un autre nom.");
            }
        }
    }

        public function Update(ApplicationRequest $request,$id)
    {
        $Application= Application::where('id','=',$id)
            ->orderBy('DDM', 'desc')
            ->first();

        $struct= structure::where('id','=',$Application->struct_id)->first();
        $struct->nb_app=$struct->nb_app-1;
        $struct->save();
        $struct= structure::where('id','=',$request['struct_id'])->first();
        $struct->nb_app=$struct->nb_app+1;
        $struct->save();
        $Application->update([

            'DDM' => Carbon::now(),
            'user_id' => $request['user_id'],
            'struct_id' => $request['struct_id']
        ]);

        return redirect()->back();
    }


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ListApp()
    {
        if(Auth::user()->Admin == 1)
        {
            return redirect('AcceuilAdmin');
        }
        $structid = Auth::user()->struct_id;
        $structname = structure::find($structid)->nom;

        $applications = DB::select(DB::raw('SELECT applications.* ,U.nom as username ,U.prenom FROM (SELECT id ,max(DDM) as dateMAJ FROM applications Group By id) as lastapp
         INNER JOIN applications ON applications.id = lastapp.id AND applications.DDM = lastapp.dateMAJ 
          JOIN users as U On applications.user_id = U.id
          WHERE (applications.struct_id = :struct_id)'),array('struct_id' => $structid));
        return view('ListApp',compact('structname','applications'));
    }

    public function showdetails($id)
    {
        $admin = false;
        if(Auth::user()->Admin == 1)
        {
            $admin = true ;
        }
        $app = DB::table('applications')
            ->where('id','=',$id)
            ->orderBy('DDM', 'desc')
            ->first();

        $user = User::where('id','=',$app->user_id)->first();
        $struct = structure::find($app->struct_id);
        $depusers = User::where('struct_id','=',$app->struct_id);
        $structures = structure::all();
        if(Auth::id() == $app->user_id)
        {
            $Responsable = true;
        }
        else
        {
            $Responsable = false;
        }
        return view('FicheApp',compact('app','Responsable','user','admin','depusers','struct','structures'));
    }

    public function Destroy($id)
    {
        $Applications= Application::where('id','=',$id)->get();
        $last_version = $Applications->last();
        $struct = structure::find($last_version->struct_id);
        $struct->nb_app -= 1;
        $struct->save();
        foreach ($Applications as $app)
        {
            $app->delete();
        }

        return redirect('/');
    }
    public function History($id){
        $app = DB::table('applications')
            ->where('id','=',$id)
            ->orderBy('DDM', 'asc')
            ->get();
        $ap = array(null);
        foreach ( $app as $applicaation){
            array_push($ap,$applicaation);
        }
        $i=count($ap);
        if ($i%2==0){
            $left='';
            $right='none';

        }else{
            $left='none';
            $right='';
        }
        return view('History',compact('app','ap','i','left','right'));

    }
}
