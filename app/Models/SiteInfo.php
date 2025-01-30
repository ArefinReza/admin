<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class SiteInfo extends Model
{
    protected $fillable = [
        'sitename',
        'email',
        'phone_number',
        'about',
        'refund',
        'parchase_guide',
        'privacy',
        'address',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'copyright_text',
    ];
}
