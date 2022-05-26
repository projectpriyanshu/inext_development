@extends('layouts.main')
@section('content')
    <div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="clientOnboarding" role="tabpanel"
                        aria-labelledby="clientOnboarding-tab">
                        <div class="detail_edit p-3" style="background:#fff;">
                            <div class="row">
                                <div class="col-md-12 row">
                                    @if(Session::has('success'))
                                        <p class="text-success text-center">{{Session::get('success')}}</p>
                                    @endif
                                    <div class="detail_edit p-3" style="background: #fff;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <nav class="tab mb-5">
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <a class="nav-link active" id="nav-client-tab" data-toggle="tab"
                                                            href="#nav-client" role="tab" aria-controls="nav-client"
                                                            aria-selected="true">Add New Business Client
                                                        </a>
                                                        {{-- <a class="nav-link" id="nav-clientLink-tab" data-toggle="tab"
                                                            href="#nav-clientLink" role="tab" aria-controls="nav-clientLink"
                                                            aria-selected="false">Client Link
                                                        </a> --}}
                                                        <a class="nav-link " id="nav-clientContactDetails-tab"
                                                            data-toggle="tab" href="#nav-clientContactDetails" role="tab"
                                                            aria-controls="nav-clientContactDetails"
                                                            aria-selected="false">Client Contact Details
                                                        </a>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="tab-content" id="nav-tabContent">
                                                <!-- Add New Business Client --->
                                                <div class="tab-pane tab-pane-background fade active show" id="nav-client"
                                                    role="tabpanel" aria-labelledby="nav-client-tab">
                                                    <div class="row">
                                                        <div class="col form-2-box wow fadeInUp">
                                                            <form action="{{route('clientOnboarding.add')}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" id="id" value="">
                                                                <fieldset class="form-group border p-3">
                                                                    <legend>Add New Business Client</legend>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-6">
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label"><span
                                                                                            class="required-star">*</span>Contact
                                                                                        Person Name</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="text"
                                                                                            class="form-control" name="name"
                                                                                            id="" value="{{old('name')}}" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label"><span
                                                                                            class="required-star">*</span>Contact
                                                                                        Email ID</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="email"
                                                                                            class="form-control" name="email"
                                                                                            id="" value="{{old('email')}}" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        <span
                                                                                            class="required-star">*</span>
                                                                                        Contact Mobile No</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="text"
                                                                                            class="form-control" name="mobile_no" value="{{old('mobile_no')}}" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label"><span
                                                                                            class="required-star">*</span>Business
                                                                                        Type</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <select id="typedrp" 
                                                                                            class="form-select" name="type" required>
                                                                                            <option value="">--Select--
                                                                                            </option>
                                                                                            <option value="Agent">Agent</option>
                                                                                            <option value="Branch">Branch</option>
                                                                                            <option value="Corporate">Corporate</option>
                                                                                            <option value="Franchise">Franchise</option>
                                                                                            <option value="Coloader">Coloader</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <input type="checkbox" name="docs[]" value="BIN No" >
                                                                                    &nbsp; BIN No <br>
                                                                                    <input type="checkbox" name="docs[]" value="CIN No">
                                                                                    &nbsp; CIN No <br>
                                                                                    <input type="checkbox" name="docs[]" value="CST">
                                                                                    &nbsp; CST
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <input type="checkbox" name="docs[]" value="TAN">
                                                                                    &nbsp; TAN <br>
                                                                                    <input type="checkbox" name="docs[]" value="VAT No">
                                                                                    &nbsp; VAT No <br>
                                                                                    <input type="checkbox" name="docs[]" value="GST IN">
                                                                                    &nbsp; GST IN
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <input type="checkbox" name="docs[]" value="PAN">
                                                                                    &nbsp; PAN <br>
                                                                                    <input type="checkbox" name="docs[]" value="CAF">
                                                                                    &nbsp; CAF <br>
                                                                                    <input type="checkbox" name="docs[]" value="KYC">
                                                                                    &nbsp; KYC
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <div class="text-end">
                                                                    <button class="btn btn-success rounded-0 mr-2">Send <i
                                                                            class="fa fa-send"></i></button>
                                                                    <button class="btn btn-primary rounded-0 mr-2">Reset <i
                                                                            class="fa fa-refresh"></i></button>
                                                                    <button class="btn btn-secondary rounded-0">Next <i
                                                                            class="fa fa-arrow-right"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Client Link --->
                                                {{-- <div class="tab-pane tab-pane-background fade" id="nav-clientLink"
                                                    role="tabpanel" aria-labelledby="nav-clientLink-tab">
                                                    <div class="row">
                                                        <div class="col form-2-box wow fadeInUp">
                                                            <form action="" method="post" class="">
                                                                <fieldset class="form-group border p-3">
                                                                    <legend>Client Link</legend>
                                                                    <div class="card mt-3">
                                                                        <div class="card-body card1">Dear Arunesh,</div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-6">
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">Document1</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="file" name=""
                                                                                            class="form-control" id="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">Document2</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="file" name=""
                                                                                            class="form-control" id="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">Document3</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="file" name=""
                                                                                            class="form-control" id="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">Document4</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="file" name=""
                                                                                            class="form-control" id="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">Additional
                                                                                        Document</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="file" name=""
                                                                                            class="form-control" id=""
                                                                                            multiple>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">Notes</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <textarea name="" id="" class="dhltext" rows="2"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <input type="checkbox" name="" id=""> &nbsp;
                                                                            Disclaimer
                                                                            <div class="alert alert-success">Show
                                                                                disclaimer</div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <div class="text-end">
                                                                    <button class="btn btn-success rounded-0 mr-2">Send <i
                                                                            class="fa fa-send"></i></button>
                                                                    <button class="btn btn-primary rounded-0 mr-2">Reset <i
                                                                            class="fa fa-refresh"></i></button>
                                                                    <button class="btn btn-secondary rounded-0">Next <i
                                                                            class="fa fa-arrow-right"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                                <!-- Client Contact Details --->
                                                <div class="tab-pane tab-pane-background fade"
                                                    id="nav-clientContactDetails" role="tabpanel"
                                                    aria-labelledby="nav-clientContactDetails-tab">
                                                    <div class="row">
                                                        <div class="col form-2-box wow fadeInUp">
                                                            <form action="" method="post" class="">
                                                                <fieldset class="form-group border p-3">
                                                                    <legend>Contact Details</legend>
                                                                    <div class="table-responsive mt-3">
                                                                        <table
                                                                            class="table-bordered table-striped table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>Sr. No.</th>
                                                                                    <th>Client Name</th>
                                                                                    <th>Mobile No</th>
                                                                                    <th>Email Id</th>
                                                                                    <th>Status</th>
                                                                                    <th>Email Sent Date</th>
                                                                                    <th>Remarks</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @php $i=1; @endphp
                                                                                @foreach($lead as $leadRow)
                                                                                <tr>
                                                                                    <td><input  name="check" type="radio" class="check3" onclick="sendOnboardingMail({{$leadRow->id}})"></td>
                                                                                    <td>{{$i++}}</td>
                                                                                    <td>{{$leadRow->client_name}}</td>
                                                                                    <td>{{$leadRow->mobile}}</td>
                                                                                    <td>{{$leadRow->email}}</td>
                                                                                    <td class="b1"><span
                                                                                            class="badge bg-success rounded-pill">{{$leadRow->status}}</span>
                                                                                    </td>
                                                                                    <td>{{$leadRow->email_sent_date}}</td>
                                                                                    <td>
                                                                                        <textarea name="" id="" class="dhltext" rows="2">{{$leadRow->remarks}}</textarea>
                                                                                    </td>
                                                                                </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </fieldset>
                                                                <div class="text-end">
                                                                    <button class="btn btn-success rounded-0 mr-2">Save <i
                                                                            class="fa fa-save"></i></button>
                                                                    <button type="button" class="btn btn-primary rounded-0" onclick="location.reload();">Reset <i
                                                                            class="fa fa-refresh"></i></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
