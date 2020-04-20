<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Score extends Model
{
    //
    protected $fillable = [
        "candidate_id", 
        "user_id","leadership",
        "entrepreneurship",
        "manegement",
        "organization",
        "personal",
        "future",
        "digital",
        "global",
        "total",
        "network",
        "strategic",
        "lead_public",
          "h_index",
          "key_note",
          "lead_op",
          "penelitian",
          "buku",
          "potensi",
          "abdi",
          "pengajaran"


    ];




}
