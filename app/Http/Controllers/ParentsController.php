<?php

namespace App\Http\Controllers;

use App\Mail\NotifyAllParents;
use App\Models\Parents;
use Illuminate\Support\Facades\Mail;

class ParentsController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:parents-list|parents-create|parents-edit|parents-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:parents-create', ['only' => ['addNewParentDetails','sendMailsToParents']]);
    //      $this->middleware('permission:parents-edit', ['only' => ['editParentDetails','updateParentDetails']]);
    //      $this->middleware('permission:parents-delete', ['only' => ['deleteParentDetails']]);
    // }


    public function index(){

        return view('admin.manage-parents', [
            
            'parents' => Parents::orderBy('name')

            ->paginate(5)->withQueryString(),
        ]);
    }

    public function addNewParentDetails()
    {
        $attributes = request()->validate([

            'name' => 'required|max:255',
            'phone_number' => 'required|max:12',
            'physical_address' => 'required',
            'email' => 'required|email|max:255|unique:users,email',
        ]);

        $parentsDetails = Parents::create($attributes);

        return redirect('/parents')->with('success', 'Parents records successfully saved');
    }

    public function sendMailsToParents()
    {

        $parents = Parents::select('email')->get();
       
        if($parents->count() > 0){

            foreach($parents as $key => $parent){

                $details = [

                    'subject' => 'Notification To All Parents',
                ];

                Mail::to($parent->email)->send(new NotifyAllParents($details));
            }
        }

        return redirect('/parents')->with('success', 'Mails successfully sent to all Parents');
    }


}