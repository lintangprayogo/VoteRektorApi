<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Candidate;
use App\Score;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CandidateController extends Controller{
    public function display(){
    	$id= Auth::id();
        $candidates=  Candidate::get();
        $scores =Score::get()->where("user_id",$id);
          foreach ($candidates as $candidate ) {
             $candidate->isSelected=0;
          	foreach ($scores as $score) {
          		if($candidate->id==$score->candidate_id){
          			  	$candidate->isSelected=1;
                    $candidate->score=$score;
                    $candidate->total=round($score->total, 2);
          			  	
                    break;
          			  }
          	}
        
          }
     
         
       return showResponseSuccess($candidates);
    }

    

    public function nilai(Request $req){
    
        $id= Auth::id();
        $lead=(float)$req->leadership;
        $entrepreneurship=(float)$req->entrepreneurship;
        $personal=(float)$req->personal;
        $strategic=(float)$req->strategic;
        $network=(float)$req->network;
        $global=(float)$req->global;
        $organization=(float)$req->organization;
        $future=(float)$req->future;
        $manegement=(float)$req->manegement;
        $digital=(float)$req->digital;

        $total=(float)($lead*0.26)+($entrepreneurship*0.175)+($strategic*0.149)+($manegement*0.11)+($network*0.078)+($organization*0.066) +($personal*0.061)+($digital*0.037)+($global*0.027)+($future*0.037);
        


        $score=Score::where("candidate_id",$req->candidate_id)->where("user_id",$id)->first();

       
 $value=[
          "leadership"=>$lead,
          "entrepreneurship"=>$entrepreneurship,
          "personal"=>$personal,
          "global"=>$global,
          "organization"=>$organization,
          "future"=>$future,
          "manegement"=>$manegement,
          "digital"=>$digital,
          "user_id"=>$id,
          "network"=>$network,
          "strategic"=>$strategic,
          "total"=>$total,
          "candidate_id"=>$req->candidate_id
          ];
    if(!$score){    	
        $response=Score::create($value);
        return showResponseSuccess($response);
    }
    else{
        $score->leadership=$lead;
        $score->entrepreneurship=$entrepreneurship;
        $score->personal=$personal;
        $score->global=$global;
        $score->organization=$organization;
        $score->future=$future;
        $score->manegement=$manegement;
        $score->digital=$digital;
        $score->network=$network;
        $score->strategic=$strategic;
        $score->total=$total;
         $score->save();
        return showResponseSuccess($score);

    }
    }



     public function nilaiV1(Request $req){
    
        $id= Auth::id();
        $public=$req->lead_public;
        $h_index=$req->h_index;
        $key_note=$req->key_note;
        $lead_op=$req->lead_op;
        $penelitian=$req->penelitian;
        $buku=$req->buku;
        $potensi=$req->potensi;
        $abdi=$req->abdi;
        $ajar=$req->pengajaran;
 

        $total=($public*0.385)+($h_index*0.158)+($key_note*0.112)+($lead_op*0.094)+($penelitian*0.072)+($buku*0.060)+
        ($potensi*0.046)+($abdi*0.038)+($ajar*0.036);

       $value=[
         "lead_public"=>$public,
          "h_index"=>$h_index,
          "key_note"=>$key_note,
          "lead_op"=>$lead_op,
          "penelitian"=>$penelitian,
          "buku"=>$buku,
          "potensi"=>$potensi,
          "abdi"=>$abdi,
          "pengajaran"=>$ajar,
          "total"=>$total,
          "user_id"=>$id,
          "candidate_id"=>$req->candidate_id
          ];

       
          
        $response=Score::create($value);
        return showResponseSuccess($response);
    }

   public function displayAvg(){
   	$avgs  = Score::join('candidates',"candidates.id","=","scores.candidate_id")->select('name','photo',DB::raw('avg(total)  as 
        average')

       )->groupBy('candidate_id')->get();
   	return showResponseSuccess($avgs);
   }
}
