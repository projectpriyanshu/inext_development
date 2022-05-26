@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="messagesheet" role="tabpanel" aria-labelledby="messagesheet-tab">
                        <!-- <h5 class="card-title">Message Summary</h5> -->
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3 mt-5">
                                <legend class="w-auto px-2 text-dark">Message Sheet</legend>
                                <form class="" action="{{route('message-sheet.add')}}" method="POST">
                                    @csrf
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">

                                                @if(session()->has('success'))
                                                <div class="alert alert-success">
                                                {{ session()->get('success') }}
                                                </div>
                                                @endif
                                                @if(session()->has('errors'))
                                                <div class="alert alert-danger">
                                                    {{ session()->get('error') }}
                                                </div>
                                                @endif
                                                <span id="alert-success" style="color: green;"></span>
                                                <span id="alert-danger" style="color: red;"></span>

                                                <div class="col-md-6">
                                                    <div class="row code form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Company</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <select name="company"
                                                                    style="width:100%;margin-bottom: 5px;"
                                                                    class="form-select" id="company" name="company" value="{{old('company')}}">
                                                                    <option>company1</option>
                                                                    <option>company2</option>
                                                                    <option>company3</option>
                                                                </select>
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('company') }}</div>
                                                             @endif

                                                        </div>
                                                    </div>
                                                    <div class="row name form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Run no.</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="runno" name="runno" value="{{old('runno')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('runno') }}</div>
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
                                                                <input type="text" class="form-control" id="sector" name="sector" value="{{old('sector')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('sector') }}</div>
                                                             @endif
                                                        </div>
                                                    </div>
    
                                                    <div class="row gststatecode form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Counter part</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="counterpart" name="counterpart" value="{{old('counterpart')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('counterpart') }}</div>
                                                             @endif
                                                        </div>
                                                    </div>
    
                                                    <div class="row gststatecode form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">A/L Mawb</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="al" name="al" value="{{old('al')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('al') }}</div>
                                                             @endif
                                                        </div>
                                                    </div>
    
                                                    <div class="row gststatecode form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Flight</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="flight" name="flight" value="{{old('flight')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('flight') }}</div>
                                                             @endif
                                                        </div>
                                                    </div>
    
                                                    <div class="row gststatecode form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Date</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="date" class="form-control" id="date" name="date" value="{{old('date')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('date') }}</div>
                                                             @endif
                                                        </div>
                                                    </div>
    
                                                    <div class="row gststatecode form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">OBC</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="obc" name="obc" value="{{old('obc')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('obc') }}</div>
                                                             @endif
                                                        </div>
                                                    </div>
                                                    <div class="msg msg1">
                                                        <input type="checkbox"> &nbsp; With Forwarding No
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                           
                                            <div class="btn_group b4">
                                                <button class="btn btn-primary excel-btn rounded-0 mr-2">Excel
                                                    <i class="fa fa-file"></i>
                                                </button>
                                                <button type="reset" class="btn btn-warning close-btn rounded-0">Close
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                <button type="submit" class="btn btn-success save-btn">Save
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                               
                                                <a href="{{route('message-sheet.list')}}" class="btn btn-secondary save-btn mr-3"> List
                                                    <i class="fa fa-list ms-2"></i>
                                                    </a>
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
     $("#flight").autocomplete({
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
             return false;
         }
     });

     var token = "{{ csrf_token() }}";
     $("#counterpart").autocomplete({
         source: function(request, response) {
             $.ajax({
                 url: "{{ route('search.counterpart') }}",
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
         select: function(event, re) {
             $('#counterpart').val(re.item.name+"-"+re.item.fname);
             return false;
         }
     });

</script>

@endpush