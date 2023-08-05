<?php

namespace App\Http\Controllers;

use App\Models\Investigator;
use App\Models\Responsible;
use App\Models\TestCase;
use App\Models\TestFile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestFileController extends Controller
{
    //

    function index()
    {
        $testFiles = TestFile::all();
        $responsibles = Responsible::where('user_id', auth()->user()->id)->get();
        $investigators = Investigator::where('user_id', auth()->user()->id)->get();
        // dd($responsible, $investigator);
        return view('welcome', compact(['testFiles', 'responsibles', 'investigators']));
    }

    function store(Request $request)
    {


        function generateCaseNumber()
        {
            $currentDateTime = Carbon::now();

            $day = $currentDateTime->format('d');
            $month = $currentDateTime->format('m');
            $minute = $currentDateTime->format('i');
            $dayMonthString = $day . $month . $minute;
            // dd($dayMonthString);
            $seed = intval($dayMonthString);


            return $seed;
        }
        // dd($request->title);
        $testFile = new TestFile();
        $testFile->case_number = generateCaseNumber();
        $testFile->title = $request->title;
        $testFile->user_id = auth()->user()->id;
        // $testFile->details = $request->details;
        $testFile->save();

        // $testFileTitle = $testFile->title;
        $testFileId = $testFile->id;
        // return redirect()->route('file.create')->with(['id'], $testFileId);
        return redirect()->route('file.create', $testFileId);
    }

    function fileCreate($testFileId)
    {
        $testFile = TestFile::where('id', $testFileId)->first();
        $investigator = Investigator::where('test_file_id', $testFileId)->get();
        // dd($investigator);
        $responsible = Responsible::where('test_file_id', $testFileId)->get();
        $users = User::all();
        return view('file-create', compact(['testFile', 'investigator', 'responsible', 'users']));
    }


    function addDetails(Request $request, $testFileId)
    {

        $currentFile = TestFile::where('id', $testFileId)->first();
        // dd($currentFile);
        $currentFile->details = $request->details;
        $currentFile->title = $request->title;
        $currentFile->save();
        return redirect()->back();

    }

    function addInvestigator(Request $request, $testFileId)
    {

        $existInvestigator = Investigator::where('test_file_id', $testFileId)->where('user_id', $request->investigator_id)->first();
        if ($existInvestigator) {
            return redirect()->back()->with('unsuccessfull-investigator', "this Investigator already exist in file.");
        }

        $investigator = new Investigator();
        $investigator->test_file_id = $testFileId;
        $investigator->user_id = $request->investigator_id;
        $investigator->save();
        return redirect()->back();


    }

    function addResponsible(Request $request, $testFileId)
    {

        $existResponsible = Responsible::where('test_file_id', $testFileId)->where('user_id', $request->responsible_id)->first();

        if ($existResponsible) {
            return redirect()->back()->with('unsuccessfull-responsible', "This responsible already exist in file.");
        }
        // dd($testFileId);
        $responsible = new Responsible();
        $responsible->test_file_id = $testFileId;
        $responsible->user_id = $request->responsible_id;
        $responsible->save();

        return redirect()->back();
    }



    function viewDetails($id)
    {
        $testFile = TestFile::where('id', $id)->first();
        $investigator = Investigator::where('test_file_id', $id)->get();
        // dd($investigator);
        $responsible = Responsible::where('test_file_id', $id)->get();
        // $testFile = TestFile::where('id', $id)->first();
        $cases = TestCase::where('test_file_id', $id)->orderBy('id', 'desc')->get();
        // dd($cases);

        return view('details', compact(['testFile', 'investigator', 'responsible', 'cases']));
    }

    function deleteResponsible($file_id)
    {

        $testFile = Responsible::where('test_file_id', $file_id)->first();
        $testFile->delete();

        return redirect()->back();

    }
    function deleteInvestigator($file_id)
    {

        $testFile = Investigator::where('test_file_id', $file_id)->first();
        $testFile->delete();

        return redirect()->back();

    }

}