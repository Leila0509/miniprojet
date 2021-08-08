<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Auth;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function AllContact(){
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }
}
