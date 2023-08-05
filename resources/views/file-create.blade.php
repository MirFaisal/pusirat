@extends('layouts.master') @section('content')

<div class="w-50 mx-auto border p-5">
    <form
        action="{{ route('file.details.store', $testFile->id) }}"
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
            />
            <!-- {{ session("testFileTitle") }} -->
        </div>
        <div class="mt-3">
            <h3>Details</h3>
            <textarea
                rows="20"
                id="mytextarea"
                id="mytextarea"
                type="text"
                name="details"
                value=""
                aria-label="First name"
                class="form-control"
            ></textarea>
            <!-- {{ session("testFileTitle") }} -->
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary mt-3" type="submit">Save</button>
        </div>
    </form>
    <!-- Investigator -->
    <div class="mt-5">
        <label for="">Investigator</label>
        <form
            method="post"
            action="{{route('investigator.store', $testFile->id)}}"
            class="mt-1 d-flex justify-content-between"
        >
            @csrf
            <select
                name="investigator_id"
                class="form-selec w-75"
                aria-label="Default select example"
            >
                <option selected>Select Investigator</option>
                @foreach($testFile->users() as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <button class="btn btn-primary">Add Investigator</button>
        </form>
        @if(session('unsuccessfull-investigator'))
        <div class="alert alert-danger mt-2">
            {{ session("unsuccessfull-investigator") }}
        </div>
        @endif
    </div>
    <!-- Investigators -->
    <h3 class="mt-5">Investigators</h3>
    <div class="">
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($investigator as $developer)
                <tr class="table-primary">
                    <th>{{$developer->userName($developer->user_id)}}</th>
                    <th>{{$developer->userEmail($developer->user_id)}}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!--Responsible  -->
    <div class="mt-5">
        <div>
            <label for="">Responsible</label>
        </div>
        <form
            method="post"
            action="{{route('responsible.store', $testFile->id)}}"
            class="mt-1 d-flex justify-content-between"
        >
            @csrf
            <select
                name="responsible_id"
                class="form-selec w-75"
                aria-label="Default select example"
            >
                <option selected>Select Responsible</option>
                @foreach($testFile->users() as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">
                Add Responsible
            </button>
        </form>
        @if(session('unsuccessfull-responsible'))
        <div class="alert alert-danger mt-2">
            {{ session("unsuccessfull-responsible") }}
        </div>
        @endif
    </div>
    <!-- Responsible -->
    <h3 class="mt-3">Responsible</h3>
    <div class="">
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($responsible as $developer)
                <tr class="table-primary">
                    <th>{{$developer->userName($developer->user_id)}}</th>
                    <th>{{$developer->userEmail($developer->user_id)}}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">
        <a
            href="{{route('file.details.show', $testFile->id)}}"
            class="btn btn-primary"
            >Next</a
        >
    </div>
</div>
@endsection
