<?php

namespace App\Http\Controllers;

use App\Mail\NotifyAllParents;
use App\Models\Parents;
use App\Models\Student;
use App\Notifications\SchoolFeePayment;
use App\Notifications\SchoolOpening;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Actions\SchoolOpeningAction;
use App\Actions\CustomSMSToUsersAction;

class ParentsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Can Edit Parent(s) Details|Can Create Parent|Can View Parent Details|Can Delete Parent(s) Details', ['only' => ['index', 'show', 'profile']]);
        $this->middleware('permission:Can Create Parent', ['only' => ['addNewParentDetails', 'sendMailsToParents']]);
        $this->middleware('permission:Can Edit Parent(s) Details', ['only' => ['editParentDetails', 'updateParentDetails']]);
        $this->middleware('permission:Can Delete Parent(s) Details', ['only' => ['deleteParentDetails']]);
    }


    public function index()
    {
        // abort_if(!auth()->user()->cannot('Can Create Parent'), 403);

        return view('admin.manage-parents', [

            'parents' => Parents::with('students')->orderBy('first_name')->filter(request(['search']))

                ->paginate(5)->withQueryString(),

            'students' => Student::orderBy('first_name')->get(),
        ]);
    }

    public function profile($id)
    {
        return view('parent-profile', [

            'parents' => Parents::with('students')->find($id),
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

        $name = explode(" ", $attributes['name'], 2);

        $first_name = $name[0];

        $last_name = !empty($name[1]) ? $name[1] : '';

        $data = [
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $attributes['email'],
            "phone_number" => $attributes['phone_number'],
            "physical_address" => $attributes['physical_address']
        ];

        $parentsDetails = Parents::create($data);

        if (isset(request()->students)) {

            foreach (request()->students as $student) {

                $parentsDetails->students()->attach($student);
            }
        }

        return redirect('/parents')->with('success', 'Parents records successfully saved');
    }

    public function sendMailsToParents()
    {

        $parents = Parents::select('email')->get();

        if ($parents->count() > 0) {

            foreach ($parents as $key => $parent) {

                $details = [

                    'subject' => 'Notification To All Parents',
                ];

                Mail::to($parent->email)->send(new NotifyAllParents($details));
            }
        }

        return redirect('/parents')->with('success', 'Mails successfully sent to all Parents');
    }

    public function sendSchoolFeeSms()
    {

        $parents = Parents::select('phone_number', 'id')->get();

        $contacts = [];

        foreach ($parents as $key => $parent) {
            
            array_push($contacts, ['recipient_id' => $key, 'dest_addr' => $parent->phone_number]);
        }

        $send = new SchoolOpeningAction();

        $send->schoolOpeningSMS($contacts);

        return redirect('/parents')->with('success', 'SMS successfully sent to Parents');
    }

    public function sendCustomSMS($id)
    {
        $message = request()->validate([

            'message' => 'required',
        ]);

        $messageContent = $message['message'];

        $parentPhone = Parents::select('phone_number')->find($id);

        $send = new CustomSMSToUsersAction();

        $send->sendCustomMessage($parentPhone, $messageContent);

        return redirect()->back()->with('success', 'Message successfully sent');
    }
}
