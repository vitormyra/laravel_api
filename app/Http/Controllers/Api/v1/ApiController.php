<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\User;
use Response;

class ApiController extends Controller
{
    // public function profile(Request $request){
    //     return Response::json([
    //         'retorno' => UserResource::collection(User::find($request->user()))
    //     ], 200);    
    // }

    // public function getToken(Request $request){ 
    //     $retorno = UserResource::collection(User::find($request->user()))
    //     return Response::json([
    //         'retorno' => $retorno;
    //     ], 200);    
    // }
}
