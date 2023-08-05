@extends('layouts.master') @section('content')
<div class="w-50 mx-auto p-5 border">
    <form method="post" action="{{ route('test.case.store', $file_id) }}">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"
                >Title</label
            >
            <input
                type="text"
                name="title"
                class="form-control"
                id="exampleFormControlInput1"
                required
            />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"
                >Case Discription</label
            >
            <textarea
                rows="10"
                id="mytextarea"
                name="description"
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="3"
            ></textarea>
        </div>
        <!-- test data -->
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"
                >Case Content</label
            >
            <textarea
                rows="10"
                id="mytextarea"
                name="content"
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="3"
                required
            ></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"
                >Kind</label
            >
            <textarea
                rows="10"
                id="mytextarea"
                name="kind"
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="3"
            ></textarea>
        </div>

        <!-- test data -->

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"
                >Rxpected Results</label
            >
            <textarea
                rows="10"
                id="mytextarea"
                name="expected_result"
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="3"
                required
            ></textarea>
        </div>

        <!-- status -->
        <div>
            <label for="">Result</label>
            <select
                name="status"
                class="form-select"
                aria-label="Default select example"
                required
            >
                <option selected>select Result</option>
                <option value="PASS">PASS</option>
                <option value="FAIL">FAIL</option>
            </select>
        </div>

        <div class="mt-3 d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Send</button>
        </div>
    </form>
</div>
@endsection
