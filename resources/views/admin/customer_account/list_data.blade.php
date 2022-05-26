<div class="retAjax">
	@if(strlen($data>= '1'))
	<table class="table table-striped">
	    <tbody>
		      <tr>
		        <td colspan="6"><h5 class="text-danger">Customer Account</h5></td>
		      </tr>
		      <tr>
		        <td><b>Type</b> : </td>
		        <td>{{$data->type}}</td>
		        <td><b>Serial No</b> : </td>
		        <td>{{$data->serial_no1}}</td>
		        <td><b>Serial No2</b> : </td>
		        <td>{{$data->serial_no2}}</td>
		      </tr>
		      <tr>
		        <td><b>Business Type</b> : </td>
		        <td>{{$data->business_type}}</td>
		        <td><b>Name</b> : </td>
		        <td>{{$data->name}}</td>
		        <td><b>Code</b> : </td>
		        <td>{{$data->code}}</td>
		      </tr>
		      <tr>
		        <td><b>GST NO</b> : </td>
		        <td>{{$data->gst_no}}</td>
		        <td><b>PAN NO</b> : </td>
		        <td>{{$data->pan_no}}</td>
		        <td><b>IEC NO</b> : </td>
		        <td>{{$data->iec_no}}</td>
		      </tr>
		      <tr>
		        <td colspan="3"><b>Aadhar No</b> : </td>
		        <td colspan="3">{{$data->aadhar_no}}</td>
		      </tr>
		      <tr>
		        <td colspan="6"><h5 class="text-danger">Address Details</h5></td>
		      </tr>
		      <tr>
		        <td><b>Contact Person</b> : </td>
		        <td>{{$data->contact_person}}</td>
		        <td><b>Address Line1</b> : </td>
		        <td>{{$data->address1}}</td>
		        <td><b>Address Line2</b> : </td>
		        <td>{{$data->address2}}</td>
		      </tr>
		      <tr>
		        <td><b>Address Line 3</b> : </td>
		        <td>{{$data->address3}}</td>
		        <td><b>Pincode</b> : </td>
		        <td>{{$data->pincode}}</td>
		        <td><b>Country Code</b> : </td>
		        <td>{{$data->country_code}}</td>
		      </tr>
		      <tr>
		        <td><b>Country</b> : </td>
		        <td>{{$data->country}}</td>
		        <td><b>City Code</b> : </td>
		        <td>{{$data->city_code}}</td>
		        <td><b>City</b> : </td>
		        <td>{{$data->city}}</td>
		      </tr>
		      <tr>
		        <td><b>State Code</b> : </td>
		        <td>{{$data->state_code}}</td>
		        <td><b>State</b> : </td>
		        <td>{{$data->state}}</td>
		        <td><b>Branch Code</b> : </td>
		        <td>{{$data->branch_code}}</td>
		      </tr>
		      <tr>
		        <td><b>Branch</b> : </td>
		        <td>{{$data->branch}}</td>
		        <td><b>Telephone</b> : </td>
		        <td>{{$data->telephone}}</td>
		        <td><b>CS Email</b> : </td>
		        <td>{{$data->cs_email}}</td>
		      </tr>
		      <tr>
		        <td><b>Billing Email</b> : </td>
		        <td>{{$data->billing_email}}</td>
		        <td><b>Website</b> : </td>
		        <td>{{$data->website}}</td>
		      </tr>
		      <tr>
		        <td colspan="6"><h5 class="text-danger">Sales Person/Account Manager</h5></td>
		      </tr>
		      <tr>
		        <td><b>Sales Person</b> : </td>
		        <td>{{$data->sales_person}}</td>
		        <td>Sales Contact</b> : </td>
		        <td>{{$data->sales_contact}}</td>
		        <td><b>Sales Email</b> : </td>
		        <td>{{$data->sales_email}}</td>
		      </tr>
		      <tr>

		        <td><b>Finance Name</b> : </td>
		        <td>{{$data->finance_name}}</td>
		        <td><b>Finance Contact</b> : </td>
		        <td>{{$data->finance_contact}}</td>
		        <td><b>Finance Email</b> : </td>
		        <td>{{$data->finance_email}}</td>
		      </tr>
		      <tr>
		      	<td>Authorized Name</b> : </td>
		        <td>{{$data->authorized_name}}</td>
		        <td><b>Authorized Contact</b> : </td>
		        <td>{{$data->authorized_contact}}</td>
		        <td><b>Authorized Email</b> : </td>
		        <td>{{$data->authorized_email}}</td>
		      </tr>
		      <tr>
		        <td colspan="6"><h5 class="text-danger">Account Setting</h5></td>
		      </tr>
		       <tr>
		        	<td><b>GST</b> : </td>
		        	<td>{{$data->gst}}</td>
		        	<td><b>Activate</b> : </td>
		        	<td>{{$data->activate}}</td>
		        	<td><b>Tariff</b> : </td>
		        	<td>{{$data->tariff}}</td>
		      </tr>
		      <tr>
		        	<td><b>Billing</b> : </td>
		        	<td>{{$data->billing}}</td>
		        	<td><b>Auto Email</b> : </td>
		        	<td>{{$data->auto_email}}</td>
		        	<td><b>Fuel Option</b> : </td>
		        	<td>{{$data->fuel_option}}</td>
		      </tr>
		      <tr>
		        	<td><b>Fuel Value</b> : </td>
		        	<td>{{$data->fuel_value}}</td>
		        	<td><b>Fuel Imp OOption</b> : </td>
		        	<td>{{$data->fuel_imp_option}}</td>
		        	<td><b>Fuel Imp Value</b> : </td>
		        	<td>{{$data->fuel_imp_value}}</td>
		      </tr>
		      <tr>
		        	<td><b>Payment</b> : </td>
		        	<td>{{$data->payment}}</td>
		        	<td><b>Currency</b> : </td>
		        	<td>{{$data->currency}}</td>
		        	<td><b>Group Code</b> : </td>
		        	<td>{{$data->group_code1}}</td>
		      </tr>
		      <tr>
		        	<td><b>Group</b> : </td>
		        	<td>{{$data->group_code2}}</td>
		        	<td><b>Covid Charges</b> : </td>
		        	<td>{{$data->covid_charges}}</td>
		        	<td><b>Rate Markup</b> : </td>
		        	<td>{{$data->rate_markup}}</td>
		      </tr>
		      <tr>
		        	<td colspan="3"><b>Markup Type</b> : </td>
		        	<td colspan="3">{{$data->markup_type}}</td>
		      </tr>
		      <tr>
		        <td colspan="6"><h5 class="text-danger">Credit Limit Setting</h5></td>
		      </tr>

		      <tr>
		        	<td><b>Credit Status</b> : </td>
		        	<td>{{$data->credit_status}}</td>
		        	<td><b>Opening Balance</b> : </td>
		        	<td>{{$data->opening_balance}}</td>
		        	<td><b>Credit Limit</b> : </td>
		        	<td>{{$data->credit_limit}}</td>
		      </tr>
		      <tr>
		        	<td><b>Credit Balance</b> : </td>
		        	<td>{{$data->credit_balance}}</td>
		        	<td><b>Notify</b> : </td>
		        	<td>{{$data->notify}}</td>
		        	<td><b>Total Sale</b> : </td>
		        	<td>{{$data->total_sale}}</td>
		      </tr>
		      <tr>
		        	<td><b>Total Debit Note</b> : </td>
		        	<td>{{$data->total_debit_note}}</td>
		        	<td><b>Total Credit Note</b> : </td>
		        	<td>{{$data->total_credit_note}}</td>
		        	<td><b>Outstanding</b> : </td>
		        	<td>{{$data->outstanding}}</td>
		      </tr>
		      <tr>
		        	<td><b>Network</b> : </td>
		        	<td>{{$data->network}}</td>
		        	<td><b>Divisible</b> : </td>
		        	<td>{{$data->divisible}}</td>
		        	<td><b>Note</b> : </td>
		        	<td>{{$data->note}}</td>
		      </tr>
		      <tr>
		        <td colspan="6"><h5 class="text-danger">Bank Details</h5></td>
		      </tr>
		      <tr>
		        	<td><b>Account No</b> : </td>
		        	<td>{{$data->account_no}}</td>
		        	<td><b>Bank Name</b> : </td>
		        	<td>{{$data->bank_name}}</td>
		        	<td><b>Account Name</b> : </td>
		        	<td>{{$data->account_name}}</td>
		      </tr>
		      <tr>
		        	<td><b>Account Name</b> : </td>
		        	<td>{{$data->account_name}}</td>
		        	<td><b>IFSC</b> : </td>
		        	<td>{{$data->ifsc}}</td>
		        	<td><b>Bank Address</b> : </td>
		        	<td>{{$data->bank_address}}</td>
		      </tr>
		      <tr>
		        	<td colspan="3"><b>Branch Office</b> : </td>
		        	<td colspan="3">{{$data->branch_office}}</td>
		      </tr>

		      <tr>
		        <td colspan="6"><h5 class="text-danger">Customer Documents Details</h5></td>
		      </tr>
		      @foreach($docs as $docsRow)
		      <tr>
		        	<td><b>Docs Name</b> : </td>
		        	<td>{{$docsRow->document}}</td>
		        	<td><b>Docs No</b> : </td>
		        	<td>{{$docsRow->kyc_no}}</td>
		        	<td><b>Docs File</b> : </td>
		        	<td><a href="{{url('customer/kyc/'.$docsRow->image)}}" target="_blank"><img src="{{url('customer/kyc/'.$docsRow->image)}}" width="50"></a></td>
		      </tr>
		      @endforeach
	    </tbody>
  </table>
  @else
  <p>No data found!</p>
  @endif
</div>