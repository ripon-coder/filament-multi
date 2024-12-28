<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;
    protected $fillable =[
        "logo",
        "mobile_number_1",
        "mobile_number_2",
        "email",
        "address",
        "facebook",
        "instragram",
        "whatsapp",
        "linkdin",
        "youtube",
        "telegram",
        "about_us",

    ];
}