@extends('layouts.master') @section('content')
<div class="w-50 mx-auto mt-5 p-5 border">
    <!-- action -->
    <div class="d-flex pb-2 justify-content-between border-bottom">
        <h3>File List</h3>
        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modal"
        >
            Create a file
        </button>
    </div>

    <!-- all files -->
    @if(auth()->user()->user_type == 'admin')
    <div class="mt-5">
        <table class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th>#</th>
                    <th>File</th>
                    <th>Title</th>
                    <th>Responsible</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testFiles as $key=> $testFile)

                <tr class="table-primary">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $testFile->case_number }}</td>
                    <td>{{$testFile->title}}</td>
                    <td>{{$testFile->responsible($testFile->user_id)}}</td>
                    <td>
                        <a
                            class="btn btn-info btn-sm text-white"
                            href="{{route('file.details.show', $testFile->id)}}"
                        >
                            View
                        </a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="mt-5" uk-filter=".js-filter; animation: slide">
        <div uk-filter="target: .js-filter">
            <!-- Filter controls -->
            <div id="table-button-group" class="d-flex">
                <button
                    class="uk-active w-100 button"
                    uk-filter-control="filter: .responsible"
                >
                    Responsible
                </button>
                <button
                    class="w-100 button"
                    uk-filter-control="filter: .investigator"
                >
                    Investigator
                </button>
            </div>

            <!-- Layout items -->
            <div class="js-filter mt-3">
                <div class="responsible">
                    @if($responsibles)
                    <div class="">
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-primary">
                                    <th>#</th>
                                    <th>File</th>
                                    <th>Title</th>
                                    <th>Responsible</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($responsibles as $key=> $responsible)

                                <tr class="table-primary">
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ $responsible->getFilenumber($responsible->test_file_id) }}
                                    </td>
                                    <td>
                                        {{$responsible->getFileTitle($responsible->test_file_id)}}
                                    </td>
                                    <td>
                                        {{$responsible->getFileResponsibile($responsible->test_file_id)}}
                                    </td>
                                    <td>
                                        <a
                                            class="btn btn-info btn-sm text-white"
                                            href="{{route('file.details.show', $responsible->test_file_id)}}"
                                        >
                                            View
                                        </a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>

                <div class="investigator">
                    @if($investigators)
                    <div class="">
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-primary">
                                    <th>#</th>
                                    <th>File</th>
                                    <th>Title</th>
                                    <th>Investigator</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($investigators as $key=> $investigator)

                                <tr class="table-primary">
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ $investigator->getFilenumber($investigator->test_file_id) }}
                                    </td>
                                    <td>
                                        {{$investigator->getFileTitle($investigator->test_file_id)}}
                                    </td>
                                    <td>
                                        {{$investigator->getFileInvestigator($investigator->test_file_id)}}
                                    </td>
                                    <td>
                                        <a
                                            class="btn btn-info btn-sm text-white"
                                            href="{{route('file.details.show', $investigator->test_file_id)}}"
                                        >
                                            View
                                        </a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
