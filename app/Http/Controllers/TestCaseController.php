<?php

namespace App\Http\Controllers;

use App\Models\TestCase;
use App\Models\TestCaseData;
use App\Models\testCaseRemark;
use App\Models\TestFile;
use Illuminate\Http\Request;



class TestCaseController extends Controller
{
    //

    function create($file_id)
    {
        return view('test-case', compact('file_id'));
    }

    function store(Request $request, $file_id)
    {

        $testFile = TestFile::where('id', $file_id)->first();
        // dd($testFile->case_number);

        $testCase = new TestCase();
        $testCase->test_file_id = $testFile->id;
        $testCase->case_no = $testFile->case_number . mt_rand(1000, 9999);
        $testCase->created_by = auth()->user()->id;
        $testCase->title = $request->title;
        $testCase->description = $request->description;
        $testCase->expected_result = $request->expected_result;
        $testCase->status = $request->status;
        $testCase->save();


        // test case data

        $testCaseData = new TestCaseData();
        $testCaseData->test_case_id = $testCase->id;
        $testCaseData->content = $request->content;
        $testCaseData->kind = $request->kind;
        $testCaseData->save();

        return redirect()->back();

    }

    function remarkCreate($case_id)
    {
        $testCaseRemarks = testCaseRemark::where('test_case_id', $case_id)->orderBy('created_at', 'desc')->get();
        // dd($testCaseRemarks);
        return view('remark', compact(['case_id', 'testCaseRemarks']));
    }

    function remarkStore(Request $request, $case_id)
    {

        $testCaseRemark = new testCaseRemark();
        $testCaseRemark->test_case_id = $case_id;
        $testCaseRemark->remark = $request->remark;
        $testCaseRemark->created_by = auth()->user()->id;
        $testCaseRemark->save();


        return redirect()->back();
    }
}