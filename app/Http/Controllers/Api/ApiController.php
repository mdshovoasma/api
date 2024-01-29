<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Helpers\jasonhelpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class ApiController extends Controller
{
//   use jason trait

use jasonhelpers;
    // get all task
    function alltodos($id=null){

        // return $id;
        if($id){

            $todos = Task::findOrFail($id);
            return response()->json([
                "status"=>'success',
                "message"=>'All todos get',
                "todos"=>$todos
    
            ],200);
        }else{

            $todos = Task::all();

            return response()->json([
                "status"=>'success',
                "message"=>'All todos get',
                "todos"=>$todos
    
            ],200);

        }
      
    }

    // store task

    function storetask(Request $request){ //from thaka asla requst thaka accept korta hoba

        $request->validate([
            "title"=> 'required|string|max:130',
        ],[

            "title"=>[
                "required"=>"title is required",
                "max"=>"max 10",

            ]
        ]
    
    
    
    );

    // return $request->user();

    $task = Task::create([
        'user_id'=>1,
        'title'=>$request->title,
        'detail'=>$request->detail,

    ]);

        return $this->success('success','successfully store',$task);

    // return response()->json([
    //     "status"=>'success',
    //     "message"=>'store task successfully',
    //       // ja bar bar likta hoi tar akta trit banaita hoi, trail bananor  aga  jadea trite banabo ta  thik kora nita hoi , trail http folder ar modda banaita hoi
    //     "todos"=>$task 

    // ],200);



    }

    // loging api

        function login(Request $request){
            $request->validate([
                "email"=>"email|required",
                "password"=>"required",
            ]);

             // auth chach korta hoba

            if(Auth::attempt([
                'email' =>$request->email,
                'password' =>$request->password

                ])){
                        $user = User::where('email',$request->email)->first();//user kuja bar bar korta hoba
                        $Token= $user->createToken('apitokan'.$user->name)->plainTextToken;
        
                        return $this->success('success','You are successfully longin',[   //data array hisaba dawa jaba
                            'user'=>$user,
                            'Token'=> $Token,
                        ],200);
                      }else{
                          return $this->erorr('erorr','you are un-auth',[],401);
                         };
            
        }
       

       


            

            /**
             * * FOR REGISTER API
             */

             function register(Request $request){            

                $request->validate([
                    'name'=>'required',
                    "email"=>"required|email",
                    "password"=>"required",
                ]);

                $user = User::create([
                    "name"=>$request->name,
                    "email"=>$request->email,
                    "password"=>Hash::make($request->password),
                ]);

                $Token= $user->createToken('apitokan'.$user->name)->plainTextToken;

                return $this->success("success",'You are success fully Register',[
                    'user'=>$user,
                    "toke"=> $Token,

                ],200);



             }
            



}
