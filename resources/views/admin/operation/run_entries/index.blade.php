@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="runentries" role="tabpanel"
                        aria-labelledby="runentries-tab">
                        <!-- <h5>RUN ENTRY</h5> -->
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3 mt-5">
                                <legend class="w-auto px-2 text-dark">Run Details</legend>
                                <!-- @php
                                foreach ($errors->all('<li>:message</li>') as $message)
                                    {
                                        echo $message;
                                    }
                                @endphp  -->
                                    <form action="{{url('run-entries-add')}}" method="post">
                                    @csrf
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                            @if(session()->has('success'))
										<div class="alert alert-success">
										  {{ session()->get('success') }}
										</div>
										@endif

                                        @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                        </div>
                                         @endif
                                                <div class="col-md-5">
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Run No.</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="run_no" id="run_no" class="form-control">
                                                            </div>
                                                            @if($errors->has('run_no'))
                                                     <div class="error">{{ $errors->first('run_no') }}</div>
                                                  @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Sector</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <select class="form-select" name="sector" id="sector">
                                                                    <option>select sector number</option>
                                                                    <option>sector1</option>
                                                                    <option>sector2</option>
                                                                    <option>sector3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        @if($errors->has('sector'))
                                                     <div class="error">{{ $errors->first('sector') }}</div>
                                                  @endif
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Counter Part</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <select class="form-select" name="counter" id="counter">
                                                                    <option>select counter number</option>
                                                                    <option> counter-no-1</option>
                                                                    <option>counter-no-2</option>
                                                                    <option>counter-no-3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        @if($errors->has('counter'))
                                                     <div class="error">{{ $errors->first('counter') }}</div>
                                                  @endif
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Flight Date</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="date" name="flight_date" id="flight_date" class="form-control">
                                                            </div>
                                                            @if($errors->has('flight_date'))
                                                     <div class="error">{{ $errors->first('flight_date') }}</div>
                                                  @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Flight</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="flight" id="flight" class="form-control aaaa" autocomplete="off">
                                                            </div>
                                                            @if($errors->has('flight'))
                                                     <div class="error">{{ $errors->first('flight') }}</div>
                                                  @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Flight No.</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="flight_no" id="flight_no" class="form-control bbbb">
                                                            </div>
                                                            @if($errors->has('flight_no'))
                                                     <div class="error">{{ $errors->first('flight_no') }}</div>
                                                  @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="zipcode" class="form-label ">OBC</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="obc" id="obc" class="form-control">
                                                            </div>
                                                            @if($errors->has('obc'))
                                                     <div class="error">{{ $errors->first('obc') }}</div>
                                                  @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">AL-MawbNo</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="AL_MawbNo" id="AL_MawbNo"  class="form-control">
                                                            </div>
                                                            @if($errors->has('AL_MawbNo'))
                                                     <div class="error">{{ $errors->first('AL_MawbNo') }}</div>
                                                  @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="btn_group b4">
                                                    <input type="hidden" name="id" id="id" value="">
                                                    <a href="{{url('run-entries-list')}}" class="btn btn-secondary save-btn mr-3"> List
                                                    <i class="fa fa-list ms-2"></i>
                                                    </a>
                                                    
                                                    <!-- <button type="button" class="btn btn-secondary save-btn mr-3" id="edit_flight"> Edit
                                                    <i class="fa fa-edit ms-2"></i>
                                                    </button> -->
                                                    <button class="btn btn-success save-btn">Save
                                                    <i class="fa fa-save ms-2"></i>
                                                    </button>
                                                    <button type="reset" class="btn btn-primary refresh-btn" >Refress
                                                    <i class="fa fa-save ms-2"></i>
                                                    </button>
                                                        <!-- <button class="btn btn-dark close-btn">Close
                                                            <i class="fa fa-times"></i>
                                                        </button> -->
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

 @push('js')
 <script type="text/javascript">
     
        var token = "{{ csrf_token() }}";
        $("#flight_no").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('search.flight') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: token,
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                        console.log(data);

                    }
                });
            },
            select: function(event, ui) {
                $('#flight').val(ui.item.fname+"-"+ui.item.flight_no);
                $('#flight_no').val(ui.item.flight_no);
                return false;
            }
        });

</script>

@endpush