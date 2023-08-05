@extends('layouts.master') @section('content')

<div class="w-50 mx-auto border p-5">
    <form
        action="{{ route('file.details.store', $testFile->user_id) }}"
        method="post"
    >
        @csrf
        <div>
            <h3>Title</h3>
            <input
                type="text"
                name="title"
                value="{{ $testFile->title }}"
                aria-label="First name"
                class="form-control"
                disabled
            />
            <!-- {{ session("testFileTitle") }} -->
        </div>
        <div class="mt-3">
            <h3>Details</h3>
            <textarea
                rows="20"
                id="mytextarea"
                type="text"
                name="details"
                value="{{$testFile->details}}"
                aria-label="First name"
                class="form-control"
            >
        {{html_entity_decode($testFile->details)}}
        </textarea
            >
            <!-- {{ session("testFileTitle") }} -->
        </div>
        <div class="d-flex justify-content-end">
            <button disabled class="btn btn-primary mt-3" type="submit">
                Save
            </button>
        </div>
    </form>
    <!-- Responsible deve -->
    <h3 class="">Responsible</h3>
    <div class="">
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th>Name</th>
                    <th>Email</th>
                    @if(auth()->user()->user_type == 'admin')
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($responsible as $developer)
                <tr class="table-primary">
                    <td>{{$developer->userName($developer->user_id)}}</td>
                    <td>{{$developer->userEmail($developer->user_id)}}</td>
                    @if(auth()->user()->user_type == 'admin' )
                    <td>
                        <a
                            class="btn btn-sm btn-danger"
                            href="{{ route('file.details.delete.responsible',$testFile->id) }}"
                            >delete</a
                        >
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Investigators -->
    <h3 class="mt-5">Investigators</h3>
    <div class="">
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th>Name</th>
                    <th>Email</th>
                    @if(auth()->user()->user_type == 'admin')
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($investigator as $developer)
                <tr class="table-primary">
                    <td>{{$developer->userName($developer->user_id)}}</td>
                    <td>{{$developer->userEmail($developer->user_id)}}</td>
                    @if(auth()->user()->user_type == 'admin' )
                    <td>
                        <a
                            class="btn btn-sm btn-danger"
                            href="{{ route('file.details.delete.investigator',$testFile->id) }}"
                            >Delete</a
                        >
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-5 d-flex justify-content-end">
        <a
            href="{{ route('test.case.create',$testFile->id) }}"
            class="btn btn-primary"
            >Add a case</a
        >
    </div>
    @if(count($cases))
    <div class="text-center py-2 alert alert-info mt-3">
        <h3>All Case's</h3>
    </div>
    <div style="height: 400px; overflow-y: scroll; margin-top: 20px">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Case Number</th>
                    <th scope="col">Title</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Result</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cases as $key => $case)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{$case->case_no}}</td>
                    <td>{{$case->title}}</td>
                    <td>{{$case->createdBy($case->created_by)}}</td>
                    <td>{{$case->result($case->case_no)}}</td>
                    <td>
                        <a
                            href="{{route('remark.create', $case->id)}}"
                            class="btn btn-info text-white"
                            >Remark</a
                        >
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center py-2 alert alert-warning mt-3">
        <h3>No case Added in this file</h3>
    </div>
    @endif
</div>
@endsection
