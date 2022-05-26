<div class="header">
   <!-- START TABS DIV -->
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="header_responisve">
         <div class="d-flex justify-content-start">
            <img src="../image/Logo.png" alt="" width="%">
         </div>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="nav nav-tabs " id="myTab" role="tablist">
            <!-- Master module sub-menus starts here -->
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle text-dark active" id="first_tab" data-toggle="tab"
                  href="#first_tab" role="tab" aria-controls="first" aria-selected="true">Master</a>
               <div class="dropdown-content">
                  <a class="text-dark" href="{{route('clientOnboarding-index')}}">Client Onboarding Process <br></a>
                  <a class="text-dark" href="{{url('country-index')}}">Country
                  <br></a>
                  <a class="text-dark" href="{{url('state-index')}}">State <br></a>
                  <a class="text-dark" href="{{url('city-index')}}">City <br></a>
                  <a class="text-dark" href="{{url('currencyexchange-index')}}">Currency Exchange<br></a>
                  <a class="text-dark" href="{{url('currencymaster-index')}}">Currency Master<br></a>
                  <a class="text-dark" href="{{route('customers.account.index')}}">Customer
                  Account <br></a>
                  <a class="text-dark" href="{{route('customer.account.list')}}">Client List
                  <br></a>
                  <a class="text-dark" href="{{route('forwarder-account-index')}}">Forwarder
                  Account <br></a>
                  <a class="text-dark" href="{{route('network-index')}}">Network
                  <br></a>
                  <a class="text-dark" href="{{route('service.master.index')}}">Service
                  <br></a>
                  <a class="text-dark" href="{{route('forwarder.service.index')}}">Forwarder
                  Service
                  <br></a>
                  <a class="text-dark" href="{{route('sale.type.master.index')}}">Sale Type
                  <br></a>
                  <a class="text-dark" href="{{url('shipment-type-index')}}">Shipment
                  Type <br></a>
                  <a class="text-dark" href="{{url('shipmentevent-index')}}">Shipment
                  Event <br></a>
                  <a class="text-dark" href="{{url('misellaneous-index')}}">Miscellaneous
                  <br></a>
                  <a class="text-dark" href="{{route('fuel-setting-index')}}">Fuel
                  Setting <br></a>
                  <a class="text-dark" href="{{route('fuel-setting-import-index')}}">Fuel
                  Setting(import) <br></a>
                  <a class="text-dark" href="{{route('route-index')}}">Route <br></a>
                  <a class="text-dark" href="{{url('vehicle-index')}}">Vehicle
                  <br></a>
                  <!-- <a class="text-dark" href="../html/master/currency_master.html">Currency
                     Master <br></a>
                     <a class="text-dark" href="../html/master/currency_exchange.html">Currency
                     Exchange
                     <br></a> -->
                  <a class="text-dark" href="{{route('employee-details-index')}}">Employee
                  Details
                  <br></a>
                  <a class="text-dark" href="{{route('currencymaster-index')}}">Currency Master
                  <br></a>
                  <a class="text-dark" href="{{url('currencyexchange-index')}}">Currency
                  Exchange
                  <br></a>
                  <a class="text-dark" href="{{route('covid.fuel')}}">COVID Fuel</a>
                  <a class="text-dark" href="{{route('commodity.index')}}"> Commodity <br></a>
               </div>
            </li>
            <!-- Master module sub-menus ends here -->
            <!-- Automation module sub-menus starts here -->
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle text-dark" id="second-tab" data-toggle="tab" href="#second"
                  role="tab" aria-controls="second" aria-selected="true">Automation</a>
               <div class="dropdown-content-sm">
                  <a class="text-dark" href="{{route('automation.index')}}">Fedex <br></a>
                  <a class="text-dark" href="{{route('inext.index')}}">Inext <br></a>
                  <a class="text-dark" href="{{route('dhl.index')}}">DHL <br></a>
                  <a class="text-dark" href="{{route('aramex.index')}}">Aramex <br></a>
                  <a class="text-dark" href="{{route('ups.index')}}">UPS <br></a>
                  <a class="text-dark" href="{{route('ecom.index')}}">ECOM <br></a>
               </div>
            </li>
            <!-- Automation module sub-menus ends here -->
            <!-- Outbound module sub-menus starts here -->
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle text-dark" id="third-tab" data-toggle="tab" href="#third"
                  role="tab" aria-controls="third" aria-selected="false">Outbound</a>
               <div class="dropdown-content">
                  <!--
                     <a class="text-dark" href="../html/outbound/quickbooking.html">Quick Booking <br></a> --->
                  <a class="text-dark" href="{{route('loadreceive.email.index')}}">Load Receive Email
                  <br></a>  
                  <a class="text-dark" id="bulkupload-tab"
                     href="{{route('bulk-upload.index')}}">Bulk Upload
                  <br></a>
                  <!-- <a class="text-dark" href="../html/outbound/pickup_entry.html">Pickup Entry <br></a>--->
                  <a class="text-dark" href="{{route('pickup-register.index')}}">Pickup
                  Register <br></a>
                  <a class="text-dark" href="{{route('pickup-drs.index')}}">Pickup DRS
                  <br></a>
                  <a class="text-dark" href="{{route('cash-entry.index')}}">Cash Entry
                  <br></a>
                  <a class="text-dark" href="{{route('cash-register.index')}}">Cash
                  Register <br></a>
                  <a class="text-dark" href="{{route('agent-manifest.index')}}">Agent
                  Manifest
                  <br></a>
                  <a class="text-dark" href="{{route('hubscan.index')}}">HUB Scan <br></a>
                  <a class="text-dark" href="{{route('send-email-awbno.index')}}">Send Email Awbno
                  <br></a>
               </div>
            </li>
            <!-- Outbound module sub-menus ends here -->
            <!-- Operation module sub-menus starts here -->
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle  text-dark" id="fourth-tab" data-toggle="tab" href="#fourth"
                  role="tab" aria-controls="fourth" aria-selected="false">Operation</a>
               <div class="dropdown-content">
                  <a class="text-dark" href="{{route('custom-invoice.index')}}">Custom Invoice
                  <br></a>
                  <a class="text-dark" href="{{route('awb-print.index')}}">Awb Print
                  <br></a>
                  <a class="text-dark" href="{{route('counter-part.index')}}">Counter
                  Part <br></a>
                  <a class="text-dark" href="{{route('flight-master.index')}}">Flight Master
                  <br></a>
                  <a class="text-dark" href="{{route('run-entries.index')}}">RunEntries
                  <br></a>
                  <a class="text-dark" href="{{route('dummies.index')}}">Dummies
                  <br></a>
                  <a class="text-dark" href="{{route('bagging.index')}}">Bagging
                  <br></a>
                  <a class="text-dark" href="{{route('bag-report.index')}}">Bag Report
                  <br></a>
                  <a class="text-dark" href="{{route('clubbing.index')}}">Clubbing
                  <br></a>
                  <a class="text-dark" href="{{route('shipping-bill.index')}}">Shipping
                  Bill <br></a>
                  <!-- <a class="text-dark" href="../html/operation/shipmenttype.html">Shipment Type <br></a> -->
                  <a class="text-dark" href="{{route('export-manifest.index')}}">Export
                  Manifest <br></a>
                  <!-- <a class="text-dark sub-dropdown content" href="#" data-toggle="modal" data-target="#">CSV
                     File <i class="fa fa-caret-right"></i></a>
                     <div class="sub-dropdown-content sub-block" id="sub-block">
                     <a class="text-dark" href="../html/operation/ukcsv.html">UK CSV
                         <br></a>
                     <a class="text-dark" href="../html/operation/usacsv">USA CSV <br></a>
                     <a class="text-dark" id="dacmanifest-tab" data-toggle="tab" href="../html/operation/dacmanifest"
                         role="tab" aria-controls="dacmanifest" aria-selected="true">DAC Manifest
                         <br></a>
                     <a class="text-dark" id="skynetmanifest-tab" data-toggle="tab" href="../html/operation/skynetmanifest"
                         role="tab" aria-controls="skynetmanifest" aria-selected="true">Skynet Manifest
                         <br></a>
                     </div> -->
                  <div class="dropdown">
                     <a class="text-dark dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">CSV File<i
                        class="fa fa-arrow-right"></i></a>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item text-dark" id="ukcsv-tab"
                           href="../html/operation/ukcsv.html">UK CSV</a>
                        <!-- <a class="dropdown-item text-dark" id="usacsv-tab" href="../html/operation/usacsv.html">USA CSV</a>
                           <a class="dropdown-item text-dark" id="dacmanifest-tab" href="../html/operation/dacmanifest.html">DAC Manifest</a>
                           <a class="dropdown-item text-dark" id="skynetmanifest-tab" href="../html/operation/skynetmanifest.html">Skynet Manifest</a> -->
                     </div>
                  </div>
                  <a class="text-dark" href="{{route('message-sheet.index')}}">Message Sheet
                  <br></a>
                  <a class="text-dark" href="{{route('dummy-report.index')}}">Dummy
                  Report <br></a>
               </div>
            </li>
            <!-- Operation module sub-menus ends here -->
            <!-- Inbound module sub-menus starts here -->
            <!-- <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle text-dark" id="fifth-tab" data-toggle="tab" href="#fifth"
                   role="tab" aria-controls="fifth" aria-selected="false">Inbound</a>
               <div class="dropdown-content">
                   <a class="text-dark" id="fedexlabelimport-tab" data-toggle="tab" role="tab"
                       aria-controls="fedexlabelimport" aria-selected="true">Fedex Label-import
                       <br></a>
                   <a class="text-dark" id="dataentry-tab" data-toggle="tab" role="tab"
                       aria-controls="dataentry" aria-selected="true">Data Entry <br></a>
                   <a class="text-dark" href="../html/inbound/flightupdate.html">Flight
                       Update <br></a>
                   <a class="text-dark" role="tab" aria-controls="hubscan" aria-selected="true">Hub Scan
                       <br></a>
                   <a class="text-dark" id="deliveryrunsheet-tab" data-toggle="tab" role="tab"
                       aria-controls="deliveryrunsheet" aria-selected="true">Delivery Run Sheet
                       <br></a>
                   <a class="text-dark" id="branchmanifest-tab" data-toggle="tab" role="tab"
                       aria-controls="branchmanifest" aria-selected="true">Branch
                       Manifest <br></a>
                   <a class="text-dark" id="agentmanifest-tab" data-toggle="tab" role="tab"
                       aria-controls="agentmanifest" aria-selected="true">Agent
                       Manifest <br></a>
                   <a class="text-dark" id="coddutycollection-tab" data-toggle="tab" role="tab"
                       aria-controls="coddutycollection" aria-selected="true">COD/DUTY
                       Collection <br></a>
                   <a class="text-dark" href="../html/inbound/excelforediimport.html">Excel for EDI
                       Import <br></a>
               </div>
               </li> -->
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle text-dark" id="fifth-tab" data-toggle="tab" href="#fifth"
                  role="tab" aria-controls="fifth" aria-selected="false">Inbound</a>
               <div class="dropdown-content">
                  <a class="text-dark" href="{{route('fedex-label-import.index')}}">Fedex Label-import
                  <br></a>
                  <a class="text-dark" href="{{route('data-entry.index')}}">Data Entry <br></a>
                  <a class="text-dark" href="{{route('flight-update.index')}}">Flight
                  Update <br></a>
                  <a class="text-dark" href="{{route('inbound-hubscan.index')}}">Hub Scan
                  <br></a>
                  <a class="text-dark" href="{{route('delivery-run-sheet.index')}}">Delivery Run Sheet
                  <br></a> 
                  <a class="text-dark" href="{{route('branch-manifest.index')}}">Branch
                  Manifest <br></a>
                  <a class="text-dark" href="{{route('agent-manifest.index')}}">Agent
                  Manifest <br></a>
                  <a class="text-dark" href="{{('cod-collection.index')}}">COD/DUTY
                  Collection <br></a>
                  <a class="text-dark" href="{{route('edi-excel-import.index')}}">Excel for EDI
                  Import <br></a>
               </div>
            </li>
            <!-- Inbound module sub-menus ends here -->
            <!-- Account module sub-menus starts here -->
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle text-dark" id="sixth-tab" data-toggle="tab" href="#sixth"
                  role="tab" aria-controls="sixth" aria-selected="false">Account</a>
               <div class="dropdown-content">
                  <a class="text-dark" href="{{route('payment-entry.index')}}">Payment
                  Entry <br></a>
                  <a class="text-dark" href="{{route('payment-summary.index')}}">Payment
                  Summary
                  <br></a>
                  <a class="text-dark" href="{{route('account-ledger.index')}}">Account Ledger
                  <br></a>
                  <a class="text-dark" href="{{route('outstanding-report.index')}}">Outstanding
                  Report <br></a>
               </div>
            </li>
            <!-- Account module sub-menus ends here -->
            <!-- Billing module sub-menus starts here -->
            <li class="nav-item">
               <a class="nav-link text-dark" id="seventh-tab" data-toggle="tab" href="#seventh" role="tab"
                  aria-controls="sixth" aria-selected="false">Billing</a>
            </li>
            <!-- Billing module sub-menus ends here -->
            <!-- Purchase module sub-menus starts here -->
            <!-- <li class="nav-item dropdown">
               <a class="nav-link text-dark dropdown-toggle" id="eighth-tab" data-toggle="tab" href="#eighth"
                   role="tab" aria-controls="sixth" aria-selected="false">Purcahse</a>
               <div class="dropdown-content-lg">
                   <a class="text-dark" href="../html/purchase/forwarderbillentry.html">Forwarder
                       Bill Entry <br></a>
                   <a class="text-dark" href="../html/purchase/forwarderbillreport.html">Forwarder
                       Bill Report <br></a>
                   <a class="text-dark" href="../html/purchase/autobillupload.html">Auto
                       Bill Upload <br></a>
                   <a class="text-dark" href="../html/purchase/forwarderbillentryimport.html">Forwarder
                       Bill
                       Entry(import) <br></a>
                   <a class="text-dark" href="../html/purchase/forwarderbillreportimport.html">Forwarder
                       Bill
                       Report(import) <br></a>
               </div>
               </li> -->
            <!-- Purchase module sub-menus ends here -->
            <!-- Customer care module sub-menus starts here -->
            <li class="nav-item">
               <a class="nav-link text-dark" id="ninth-tab" data-toggle="tab" href="#ninth" role="tab"
                  aria-controls="sixth" aria-selected="false">Customer Care</a>
            </li>
            <!-- Customer care module sub-menus ends here -->
            <!-- Reports module sub-menus starts here -->
            <li class="nav-item dropdown text-dark">
               <a class="nav-link dropdown-toggle text-dark" id="tenth-tab" data-toggle="tab" href="#tenth"
                  role="tab" aria-controls="tenth" aria-selected="false">Reports</a>
               <div class="dropdown-content report">
                  <div class="report_module">
                     <div class="btn-group dropright">
                        <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split"
                           data-toggle="dropdown" role="tab" aria-haspopup="true" aria-expanded="false">
                        Export
                        <span class=""><i class="fa fa-caret-right"></i></span>
                        </button>
                        <div class="dropdown-menu dropdown-content export">
                           <!-- Dropdown menu links -->
                           <a class="text-dark" href="../html/reports/export/loadinscanreport.html"
                              data-toggle="modal" data-target="#load_inscan_report">
                           Load Inscan
                           Report
                           <br></a>
                           <a class="text-dark" href="../html/reports/export/bookingreport.html"
                              data-toggle="modal" data-target="#booking_report">Booking Report<br></a>
                           <a class="text-dark" href="../html/reports/export/salesreport.html"
                              data-toggle="modal" data-target="#sales_report">Sales
                           Report<br></a>
                           <a class="text-dark" href="../html/reports/export/salesreportwithmisc.html"
                              data-toggle="modal" data-target="#sales_report_with_misc">Sales Report
                           With
                           Misc<br></a>
                           <a class="text-dark" href="../html/reports/export/cashreport.html"
                              data-toggle="modal" data-target="#cash_report">Cash
                           Report<br></a>
                           <a class="text-dark" href="../html/reports/export/codreport.html"
                              data-toggle="modal" data-target="#cod_report">COD
                           Report<br></a>
                           <a class="text-dark" href="../html/reports/export/unbilledreport.html"
                              data-toggle="modal" data-target="#unbilled_report">Unbilled
                           Report<br></a>
                           <a class="text-dark" href="../html/reports/export/rtoshipmentreport.html"
                              data-toggle="modal" data-target="#rto_shipment_report">RTO Shipment
                           Report<br></a>
                           <a class="text-dark" href="../html/reports/export/holdshipmentreport.html"
                              data-toggle="modal" data-target="#hold_shipment_report">Hold Shipment
                           Report<br></a>
                           <a class="text-dark" href="../html/reports/export/complaintreport.html"
                              data-toggle="modal" data-target="#complaint_report">Complaint
                           Report<br></a>
                           <a class="text-dark" href="../html/reports/export/agentmanifestreport.html"
                              data-toggle="modal" data-target="#agent_manifest_report">Agent Manifest
                           Report<br></a>
                        </div>
                     </div>
                     <div class="btn-group dropright text-dark">
                        <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split"
                           data-toggle="dropdown" role="tab" aria-haspopup="true" aria-expanded="false">
                        Import
                        <i class="fa fa-caret-right"></i>
                        </button>
                        <div class="dropdown-menu dropdown-content import">
                           <!-- Dropdown menu links -->
                           <a class="text-dark" href='../html/reports/import/bookingreport.html'
                              data-toggle="modal" data-target="#bookingReport">Booking Report<br></a>
                           <a class="text-dark" href="../html/reports/import/branchmanifestreport.html"
                              data-toggle="modal" data-target="#branchManifestReport">Branch Manifest
                           Report <br></a>
                           <a class="text-dark" href="../html/reports/import/networkmanifestreport.html"
                              data-toggle="modal" data-target="#networkManifestReport">Network
                           Manifest Report<br></a>
                           <a class="text-dark" href="../html/reports/import/drsreport.html"
                              data-toggle="modal" data-target="#drsReport">DRS
                           Report<br></a>
                           <a class="text-dark" href="../html/reports/import/scanreport.html"
                              data-toggle="modal" data-target="#scanReport">Scan
                           Report<br></a>
                           <a class="text-dark" href="../html/reports/import/codcollectionreport.html"
                              data-toggle="modal" data-target="#cod/dutyCollectionReport">COD/DUTY
                           Collection Report<br></a>
                           <a class="text-dark" href="../html/reports/import/salesreport.html"
                              data-toggle="modal" data-target="#salesReport">Sales
                           Report<br></a>
                        </div>
                     </div>
                  </div>
               </div>
            </li>
            <!-- Reports module sub-menus ends here -->
            <!-- Setting module sub-menus starts here -->
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle text-dark" id="eleventh-tab" data-toggle="tab"
                  href="#eleventh" role="tab" aria-controls="eleventh" aria-selected="false">Setting</a>
               <div class="dropdown-content">
                  <a class="text-dark" href="{{route('company.index')}}">Company
                  <br></a>
                  <a class="text-dark" href="{{route('franchise.index')}}">Franchise<br></a>
                  <a class="text-dark" href="{{route('user-registration.index')}}">User
                  Registration
                  <br></a>
                  <a class="text-dark" href="{{route('user-list.index')}}">User
                  List<br></a>
                  <a class="text-dark" href="{{route('employee-list.index')}}">Employee
                  List <br></a>
                  <a class="text-dark" href="{{route('awb-log.index')}}">Awb Log
                  <br></a>
                  <a class="text-dark" href="{{route('change-password.index')}}">Change
                  Password <br></a>
                  <a class="text-dark" href="{{route('login-audit.index')}}">Login Audit
                  <br></a>
                  <a class="text-dark" href="{{route('api-user.index')}}">API User
                  <br></a>
                  
                  <a class="text-dark" href="{{route('user.type')}}">User_Type
                     <br></a>
               </div>
            </li>
            <!-- Setting module sub-menus ends here -->
            <!-- User module sub-menus starts here -->
            <li class="nav-item dropdown">
               <a class="nav-link text-dark dropdown-toggle" id="twelveth-tab" data-toggle="tab"
                  href="#twelveth" role="tab" aria-controls="sixth" aria-selected="false"><i
                  class="fas fa-user"> User</i></a>
               <div class="dropdown-content">
                  <a class="text-dark" href='#'><i class="fas fa-map-marker-alt"> Location</i><br></a>
                  <a class="text-dark" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"> Log
                  Out</i><br></a>
                  <a class="text-dark" href="#"><i class="fas fa-cog"> Settings</i></a>
               </div>
            </li>
            <!-- User module sub-menus ends here -->
         </ul>
      </div>
   </nav>