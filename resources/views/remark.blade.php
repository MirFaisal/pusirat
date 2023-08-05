@extends('layouts.master') @section('content')
<div class="w-50 border mx-auto p-5">
    <div>
        <div>
            <h2 class="mt-2">All Remarks</h2>
            @if(count($testCaseRemarks))
            <!-- <p>{{ count($testCaseRemarks) }}</p> -->
            <div class="border p-3" style="height: 600px; overflow-y: scroll">
                @foreach($testCaseRemarks as $remark)
                <div class="">
                    <h4>{{$remark->userName($remark->created_by)}}</h4>
                    <div
                        class="alert alert-info d-flex justify-content-between align-items-base"
                    >
                        <div class="w-75">
                            {!!html_entity_decode($remark->remark)!!}
                        </div>
                        <span>
                            {{$remark->created_at->format('j F, Y, g:i a')}}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="alert alert-warning">Not avoidable</p>
            @endif

            <!--  -->
            <form method="post" action="{{ route('remark.store', $case_id) }}">
                @csrf
                <div class="mt-3">
                    <h3>Remark</h3>
                    <textarea
                        rows="20"
                        id="mytextarea"
                        type="text"
                        name="remark"
                        aria-label="First name"
                        class="form-control"
                    ></textarea>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
