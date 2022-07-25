<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','task_title','task_des','priority','assign_to','start_datetime','end_datetime','dl_datetime','status','task_progress'];
}
