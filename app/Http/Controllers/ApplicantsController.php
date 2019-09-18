<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;

class ApplicantsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::orderBy('created_at', 'desc')->paginate(4);
        return view('applicants.index')->with('applicants', $applicants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applicants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'sname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'cover_letter' => 'required',
            'passport' => 'required|image|max:100|mimes:jpeg',
            'resume' => 'required|file|max:2000|mimes:pdf,doc,docx'
        ]);

        // Handle File Upload
        if ($request->hasFile('passport') || $request->hasFile('resume')) {
            // Get filename with extension
            $filenameWithExt = $request->file('passport')->getClientOriginalName();
            $filenameWithExt2 = $request->file('resume')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('passport')->getClientOriginalExtension();
            $extension2 = $request->file('resume')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $fileNameToStore2 = $filename2 . '_' . time() . '.' . $extension2;
            //Upload Image
            $path = $request->file('passport')->storeAs('public/passport', $fileNameToStore);
            $path = $request->file('resume')->storeAs('public/passport', $fileNameToStore2);
        } else {
            $fileNameToStore = 'noimage.jpg';
            $fileNameToStore2 = 'noimage.jpg';
        }

        //Create Applicant
        $applicant = new Applicant;
        $applicant->fname = $request->input('fname');
        $applicant->sname = $request->input('sname');
        $applicant->phone = $request->input('phone');
        $applicant->email = $request->input('email');
        $applicant->cover_letter = $request->input('cover_letter');
        $applicant->passport = $request->input('passport');
        $applicant->resume = $request->input('resume');
        //$applicant->user_id = auth()->user()->id;

        if ($request->hasFile('passport') || $request->hasFile('resume')) {
            $applicant->passport = $fileNameToStore;
            $applicant->resume = $fileNameToStore2;
        }


        $applicants = Applicant::count();
        if ($applicants >= 4) {

            return redirect('/')->with('error', 'Application Closed!');
        } else {

            $applicant->save();
            return redirect('/')->with('success', 'Good Luck!');
        }
    }
}
