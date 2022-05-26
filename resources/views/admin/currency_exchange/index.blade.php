@extends('layouts.main')
@section('content')
<div class="row background_image">
    <div class="col-md-12">
        <div class="card-body">
            <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
            <div class="tab-content mt-5">
                <!-- <div class="tab-pane fade show active" id="currencyexchange" role="tabpanel"
                    aria-labelledby="currencyexchange-tab"> -->
                    <!-- <h5 class="card-title">Currency Exchange Master</h5> -->
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">Currency Exchange Master</legend>
                            <form class="" action="{{url('currencyexchange-add')}}" method="post">
                                @csrf()
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
                                        <span id="alert-success" style="color: green;"></span>
                                        <span id="alert-danger" style="color: red;"></span>
                                        </div>

                                        <fieldset class="form-group border p-3 mt-4">
                                            <legend>Details</legend>
                                            
                                            <div class="row ">
                                            <div class="col-md-6">
                                                <div class="row code form-group">
                                                   <div class="col-md-3">
                                                      <label for="name" class="form-label ">Search</label>
                                                   </div>
                                                   <div class="col-md-9">
                                                      <div class="bind_input">
                                                         <span class="spacing">:</span>
                                                         <input type="text" class="form-control" placeholder="Search here..." name="search" id="search">
                                                         <button type="button" id="search_btn" class="btn btn-common rounded-0 save-btn">
                                                         <span><i class="fa fa-search"></i></span>
                                                         </button>
                                                      </div>
                                                   </div>
                                                </div>
                                            </div>
                                           

                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col-md-3">
                                                            <label for="name" class="form-label">Currency</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" id="currency" name="currency" value="{{old('currency')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row text-end mb-3">
                                                        @if($errors->has('currency'))
                                                             <div class="error">{{ $errors->first('currency') }}</div>
                                                          @endif
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col-md-3">
                                                            <label for="name" class="form-label">Amount</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" placeholder="0.0" id="amount" name="amount" value="{{old('amount')}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row text-end mb-3">
                                                        @if($errors->has('amount'))
                                                             <div class="error">{{ $errors->first('amount') }}</div>
                                                          @endif
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col-md-3">
                                                            <label for="name" class="form-label">From Date</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="date" class="form-control" id="from_date" name="from_date" value="{{old('from_date')}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row text-end mb-3">
                                                        @if($errors->has('from_date'))
                                                             <div class="error">{{ $errors->first('from_date') }}</div>
                                                          @endif
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col-md-3">
                                                            <label for="name" class="form-label">To Date</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="date" class="form-control" id="to_date" name="to_date" value="{{old('to_date')}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row text-end mb-3">
                                                        @if($errors->has('to_date'))
                                                             <div class="error">{{ $errors->first('to_date') }}</div>
                                                          @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="card-footer">
                                        <div class="btn_group text-center">
                                            <input type="hidden" name="id" id="id">
                                            <button type="button" id="edit_currency"class="btn btn-warning">Edit
                                                <i class="fa fa-pencil-alt"></i>
                                            </button>
                                            <button type="submit" class="btn btn-primary" onclick="return validate()">Add
                                                <i class="fa fa-folder-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" id="delete_currency">Delete
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <button type="button" class="btn btn-dark" id="refresh_currency">Refresh
                                                <i class="fa fa-refresh"></i>
                                            </button> 

                                            <a href="{{url('currencyexchange-list')}}" class="btn btn-success">List
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <textarea rows="12" class="currencyexchangetext"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
     function validate(){
    var cde = $("input[name='currency']").val();
    if(cde.length < 1){
        alert('The currency field is required');
        $("input[name='currency']").focus();
        return false;
    }
    var nme = $("input[name='amount']").val();
    if(nme.length < 1 || isNaN(nme)){
        alert('The amount field is required and must be a number');
        $("input[name='amount']").focus();
        return false;
    }
    var cntry = $("input[name='from_date']").val();
    if(cntry.length < 1){
        alert('The from date field is required');
        $("input[name='from_date']").focus();
        return false;
    }
    var stat = $("input[name='to_date']").val();
    if(stat.length < 1){
        alert('The to date field is required');
        $("input[name='to_date']").focus();
        return false;
    }
    }

   $(document).ready(function(){
      $('#search_btn').click(function(){
         var search = $('#search').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: baseurl + "/currencyexchange-index", 
            data: {'_token':token,'search':search},
            success: function(result){
               var currency = jQuery.parseJSON( result );
               console.log(currency);
               $('#id').val(currency.id);
               $('#currency').val(currency.currency).prop('disabled',true);
               $('#amount').val(currency.amount).prop('disabled',true);
               $('#from_date').val(currency.from_date).prop('disabled', true);
               $('#to_date').val(currency.to_date).prop('disabled', true);
              
               if(currency.status == '400')
               {
                  $('#id').val();
                  $('#currency').val();
                  $('#amount').val();
                  $('#from_date').val();
                  $('#to_date').val();
                
                  $('#currency').prop('disabled', false);
                  $('#amount').prop('disabled', false);
                  $('#from_date').prop('disabled', false);
                  $('#to_date').prop('disabled', false);
                  
                  $('#alert-danger').text(currency.message);
               }
            }  
         });
      });

      $('#edit_currency').click(function() 
      {
         $('#currency').prop('disabled', false);
         $('#amount').prop('disabled', false);
         $('#from_date').prop('disabled',false);
         $('#to_date').prop('disabled',false);
         
      })

      $('#delete_currency').click(function() 
      {
        var id = $('#id').val();
         var token = "{{csrf_token()}}";
         $.ajax({
            url: "{{route('delete-currency')}}", 
            data: {'_token':token,'id':id},
            success: function(){
                alert('Data Deleted Successfully!')
                location.reload();
            }
      })
   });

   $('#refresh_currency').click(function(){
       location.reload();
   });
   
   });

</script>
@endpush   