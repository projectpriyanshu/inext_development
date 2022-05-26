<?php

use App\Http\Controllers\AccountLedgerController;
use App\Http\Controllers\AgentManifestController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\AramexController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AutomationController;
use App\Http\Controllers\AwbLogController;
use App\Http\Controllers\AwbPrintController;
use App\Http\Controllers\BaggingController;
use App\Http\Controllers\BagReportController;
use App\Http\Controllers\BranchManifestController;
use App\Http\Controllers\BulkUploadController;
use App\Http\Controllers\CashEntryController;
use App\Http\Controllers\CashRegisterController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClubbingController;
use App\Http\Controllers\CodCollectionController;
use App\Http\Controllers\CommodityController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\CounterpartController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CovidFuelController;
use App\Http\Controllers\CurrencyExchangeMasterController;
use App\Http\Controllers\CurrencyMasterController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\CustomInvoiceController;
use App\Http\Controllers\DataEntryController;
use App\Http\Controllers\DeliveryRunSheetController;
use App\Http\Controllers\DhlController;
use App\Http\Controllers\DummiesController;
use App\Http\Controllers\DummyReportController;
use App\Http\Controllers\EcomController;
use App\Http\Controllers\EdiExcelImportController;
use App\Http\Controllers\EmployeeDetailController;
use App\Http\Controllers\ExportManifestController;
use App\Http\Controllers\FedexLabelImportController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\FlightUpdateController;
use App\Http\Controllers\ForwarderMasterController;
use App\Http\Controllers\ForwarderServiceMasterController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\FuelSettingExportMasterController;
use App\Http\Controllers\FuelSettingImportMasterController;
use App\Http\Controllers\HubscanController;
use App\Http\Controllers\InboundHubscanController;
use App\Http\Controllers\InextController;
use App\Http\Controllers\LoadReceiveEmailController;
use App\Http\Controllers\LoginAuditController;
use App\Http\Controllers\MessageSheetController;
use App\Http\Controllers\MisellaneousMasterController;
use App\Http\Controllers\NetworkMasterController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\OutstandingReportController;
use App\Http\Controllers\PaymentEntryController;
use App\Http\Controllers\PaymentSummaryController;
use App\Http\Controllers\PickupDrsController;
use App\Http\Controllers\PickUpRegisterController;
use App\Http\Controllers\RouteMasterController;
use App\Http\Controllers\RunEntriesController;
use App\Http\Controllers\SaleTypeMasterController;
use App\Http\Controllers\SendEmailAwbnoController;
use App\Http\Controllers\ServiceMasterController;
use App\Http\Controllers\ShipmentEventMasterController;
use App\Http\Controllers\ShipmentTypeMasterController;
use App\Http\Controllers\ShippingBillController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UpsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\VehicleMasterController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware([IsAdmin::class])->group(function () {
});

Route::group(['middleware' => ['auth']], function () {
    //run entries
    Route::get('/run-entries.index', [RunEntriesController::class, 'index'])->name('run-entries.index');
    Route::get('/run-entries-list', [RunEntriesController::class, 'list']);
    Route::post('/run-entries-add', [RunEntriesController::class, 'store']);
    Route::post('/search-flight', [RunEntriesController::class, 'searchflight'])->name('search.flight');
    //flight master

    Route::get('/flight-index', [FlightController::class, 'index'])->name('flight-master.index');
    Route::get('/flight-list', [FlightController::class, 'list']);
    Route::post('/flight-add', [FlightController::class, 'store']);

    //counter master

    Route::get('/counter-part-index', [CounterpartController::class, 'index'])->name('counter-part.index');
    Route::get('/counter-part-list', [CounterpartController::class, 'list']);
    Route::post('/counter-part-add', [CounterpartController::class, 'store']);

    //company profile

    Route::get('/company.index', [CompanyProfileController::class, 'index'])->name('company.index');
    Route::get('/company-prof-list', [CompanyProfileController::class, 'list']);
    Route::post('/company-prof.add', [CompanyProfileController::class, 'store']);

    //state

    Route::get('/state-index', [StateController::class, 'index']);
    Route::get('/state-list', [StateController::class, 'list']);
    Route::post('/state-add', [StateController::class, 'store']);
    Route::get('state-export', [StateController::class, 'export'])->name('state-export');

    // Service Master Routes
    Route::get('/service-master-index', [ServiceMasterController::class, 'index'])->name('service.master.index');
    Route::post('/service-master-add', [ServiceMasterController::class, 'store'])->name('service.master.add');
    Route::get('/service-master-list', [ServiceMasterController::class, 'show'])->name('service.master.list');
    Route::post('/search-service-master', [ServiceMasterController::class, 'searchServiceMaster'])->name('search.service.master');
    Route::get('service-export', [ServiceMasterController::class, 'export'])->name('service-export');

    // Service Master Routes

    // Service Master Routes
    Route::get('/forwarder-service-index', [ForwarderServiceMasterController::class, 'index'])->name('forwarder.service.index');
    Route::post('/forwarder-service-add', [ForwarderServiceMasterController::class, 'store'])->name('forwarder.service.add');
    Route::get('/forwarder-service-list', [ForwarderServiceMasterController::class, 'show'])->name('forwarder.service.list');
    Route::post('/search-forwarder-service', [ForwarderServiceMasterController::class, 'searchForwarderService'])->name('search.forwarder.service');
    Route::post('/search-forwarder', [ForwarderServiceMasterController::class, 'searchForwarder'])->name('search.forwarder');
    Route::get('/forwarder-service-export', [ForwarderServiceMasterController::class, 'export'])->name('forwarder-service-export');
    // Service Master Routes

    // Sale Type Master Routes
    Route::get('/sale-type-master-index', [SaleTypeMasterController::class, 'index'])->name('sale.type.master.index');
    Route::post('/sale-type-master-add', [SaleTypeMasterController::class, 'store'])->name('sale.type.master.add');
    Route::get('/sale-type-master-list', [SaleTypeMasterController::class, 'show'])->name('sale.type.master.list');
    Route::post('/search-sale-type-master', [SaleTypeMasterController::class, 'searchSaleTypeMaster'])->name('search.sale.type.master');
    Route::get('sale-type-export', [SaleTypeMasterController::class, 'export'])->name('sale-type-export');
    // Sale Type Master Routes

    // Customer Account Route

    Route::post('/customer-account-store', [CustomerAccountController::class, 'store'])->name('customers.account.store');
    Route::get('/customer-list', [CustomerAccountController::class, 'list'])->name('customer-list');
    Route::get('/customer-list-export', [CustomerAccountController::class, 'export'])->name('customer-list-export');
    Route::get('/cutomers-aacount-index', [CustomerAccountController::class, 'index'])->name('customers.account.index');
    Route::post('/search-customer-account', [CustomerAccountController::class, 'searchCustomerAccount'])->name('search.customers.account');
    Route::get('/customer-account-list', [CustomerAccountController::class, 'customerAccountList'])->name('customer.account.list');
    Route::post('/search-customer-account-list', [CustomerAccountController::class, 'searchCustomerAccountList'])->name('search.customer.account.list');
    Route::get('/customer-data-export', [CustomerAccountController::class, 'exportCustomerData'])->name('customer-data-export');

    Route::post('/search-country', [CustomerAccountController::class, 'searchCountry'])->name('search.country');
    Route::post('/search-states', [CustomerAccountController::class, 'searchState'])->name('search.state');
    Route::post('/city-search', [CustomerAccountController::class, 'searchCity'])->name('search.city');
    Route::post('/search-forwarder-master', [CustomerAccountController::class, 'searchForwarderMaster'])->name('search.forwarder.master');
    Route::post('/service-master-search', [CustomerAccountController::class, 'serviceMasterSearch'])->name('service.master.search');
    // Customer Account Route

    Route::get('/misellaneous-index', [MisellaneousMasterController::class, 'index']);
    Route::get('/misellaneous-list', [MisellaneousMasterController::class, 'list']);
    Route::post('/misellaneous-add', [MisellaneousMasterController::class, 'store']);
    Route::get('misellaneous-export', [MisellaneousMasterController::class, 'export'])->name('misellaneous-export');

    Route::get('/city-index', [CityController::class, 'index'])->name('city-index');
    Route::get('/city-list', [CityController::class, 'list']);
    Route::post('/city-add', [CityController::class, 'store']);
    Route::get('city-export', [CityController::class, 'export'])->name('city-export');

    Route::get('/route-index', [RouteMasterController::class, 'index'])->name('route-index');;
    Route::get('/route-list', [RouteMasterController::class, 'list']);
    Route::post('/route-add', [RouteMasterController::class, 'store']);
    Route::get('route-export', [RouteMasterController::class, 'export'])->name('route-export');

    Route::get('/currencymaster-index', [CurrencyMasterController::class, 'index'])->name('currencymaster-index');;
    Route::get('/currencymaster-list', [CurrencyMasterController::class, 'list']);
    Route::post('/currencymaster-add', [CurrencyMasterController::class, 'store']);
    Route::get('currencymaster-export', [CurrencyMasterController::class, 'export'])->name('currencymaster-export');
    Route::get('currencymaster-delete', [CurrencyMasterController::class, 'destroy'])->name('currencymaster-delete');

    Route::get('/network-index', [NetworkMasterController::class, 'index'])->name('network-index');
    Route::post('/network-add', [NetworkMasterController::class, 'store'])->name('network-add');
    Route::get('/network-list', [NetworkMasterController::class, 'list'])->name('network-list');
    Route::get('network-export', [NetworkMasterController::class, 'export'])->name('network-export');

    Route::get('/forwarder-account-index', [ForwarderMasterController::class, 'index'])->name('forwarder-account-index');
    Route::post('/forwarder-account-add', [ForwarderMasterController::class, 'store'])->name('forwarder-account-add');
    Route::get('/forwarder-account-list', [ForwarderMasterController::class, 'list'])->name('forwarder-account-list');
    Route::get('forwarder-account-export', [ForwarderMasterController::class, 'export'])->name('forwarder-account-export');

    Route::get('/employee-details', [EmployeeDetailController::class, 'index'])->name('employee-details-index');
    Route::post('/employee-details-add', [EmployeeDetailController::class, 'store'])->name('employee-details-add');
    Route::get('/employee-details-list', [EmployeeDetailController::class, 'list'])->name('employee-details-list');
    Route::get('employee-details-export', [EmployeeDetailController::class, 'export'])->name('employee-details-export');

    Route::get('/fuel-setting-index', [FuelSettingExportMasterController::class, 'index'])->name('fuel-setting-index');
    Route::post('/fuel-setting-add', [FuelSettingExportMasterController::class, 'store'])->name('fuel-setting-add');
    Route::get('/fuel-setting-list', [FuelSettingExportMasterController::class, 'list'])->name('fuel-setting-list');
    Route::get('fuel-setting-export', [FuelSettingExportMasterController::class, 'export'])->name('fuel-setting-export');
    Route::get('fuel-setting-export-delete', [FuelSettingExportMasterController::class, 'destroy'])->name('fuel-setting-export-delete');

    Route::post('/search-client', [CommonController::class, 'searchClient'])->name('search-client');
    Route::post('/search-network', [CommonController::class, 'searchNetwork'])->name('search-network');

    Route::get('/fuel-setting-import-index', [FuelSettingImportMasterController::class, 'index'])->name('fuel-setting-import-index');
    Route::post('/fuel-setting-import-add', [FuelSettingImportMasterController::class, 'store'])->name('fuel-setting-import-add');
    Route::get('/fuel-setting-import-list', [FuelSettingImportMasterController::class, 'list'])->name('fuel-setting-import-list');
    Route::get('fuel-setting-import', [FuelSettingImportMasterController::class, 'export'])->name('fuel-setting-import-export');
    Route::get('fuel-setting-import-delete', [FuelSettingImportMasterController::class, 'destroy'])->name('fuel-setting-import-delete');

    Route::post('/search-city', [CommonController::class, 'searchCity'])->name('search-city');

    //country route
    Route::get('/country-index', [CountryController::class, 'index']);
    Route::get('/country-list', [CountryController::class, 'list']);
    Route::post('/country-add', [CountryController::class, 'store']);
    Route::get('country-export', [CountryController::class, 'export'])->name('country-export');

    //vehicle route
    Route::get('/vehicle-index', [VehicleMasterController::class, 'index']);
    Route::get('/vehicle-list', [VehicleMasterController::class, 'list']);
    Route::post('/vehicle-add', [VehicleMasterController::class, 'store']);
    Route::get('vehicle-export', [VehicleMasterController::class, 'export'])->name('vehicle-export');

    //currency exchange
    Route::get('/currencyexchange-index', [CurrencyExchangeMasterController::class, 'index']);
    Route::get('/currencyexchange-list', [CurrencyExchangeMasterController::class, 'list']);
    Route::post('/currencyexchange-add', [CurrencyExchangeMasterController::class, 'store']);
    Route::get('/currencyexchange-delete', [CurrencyExchangeMasterController::class, 'destroy'])->name('delete-currency');
    Route::get('currency-export', [CurrencyExchangeMasterController::class, 'export'])->name('currency-export');

    //shipmentevent
    Route::get('/shipmentevent-index', [ShipmentEventMasterController::class, 'index']);
    Route::post('/shipmentevent-add', [ShipmentEventMasterController::class, 'store']);
    Route::get('/shipmentevent-list', [ShipmentEventMasterController::class, 'list']);
    Route::get('shipmentevent-export', [ShipmentEventMasterController::class, 'export'])->name('shipmentevent-export');

    // covid fuel //
    Route::get('/covid-fuel-index', [CovidFuelController::class, 'index'])->name('covid.fuel');
    Route::post('/covid-fuel-add', [CovidFuelController::class, 'add'])->name('covid.fuel.add');
    Route::post('/covid-fuel-search', [CovidFuelController::class, 'search'])->name('covid.fuel.search');
    Route::get('/covid-fuel-list', [CovidFuelController::class, 'list'])->name('covid.fuel.list');
    Route::get('covid-fuel-export', [CovidFuelController::class, 'export'])->name('covid-fuel-export');
    Route::get('search-network-code', [CovidFuelController::class, 'searchNetwork'])->name('search-network-code');
    // covid fuel //

    // Automatioin route
    Route::get('/automation-index', [AutomationController::class, 'index'])->name('automation.index');
    Route::post('/automation-store', [AutomationController::class, 'store'])->name('automation.store');

    // Automatioin route

    //Shipment Type
    Route::get('/shipment-type-index', [ShipmentTypeMasterController::class, 'index']);
    Route::get('/shipment-type-list', [ShipmentTypeMasterController::class, 'list']);
    Route::post('/shipment-type-add', [ShipmentTypeMasterController::class, 'store']);
    Route::get('/shipment-type-export', [ShipmentTypeMasterController::class, 'export'])->name('shipment-type-export');

    //verify gst code  statewise
    Route::post('/verify-gst-statewise', [CommonController::class, 'verifyGstStatewise'])->name('verify.gst.statewise');

    // export data route
    Route::get('/export-data', [CommonController::class, 'exportData'])->name('export.data');
    // export data route

    //UPS
    Route::get('/ups-index', [UpsController::class, 'index'])->name('ups.index');
    Route::post('/ups-store', [UpsController::class, 'store'])->name('ups.store');

    //Inext
    Route::get('inext-index', [InextController::class, 'index'])->name('inext.index');

    //Search Country
    Route::get('search-country', [StateController::class, 'searchCountry'])->name('search-country');

    //DHL
    Route::get('dhl-index', [DhlController::class, 'index'])->name('dhl.index');
    Route::post('/dhl-store', [DhlController::class, 'store'])->name('dhl.store');
    Route::get('/dhl-generate-awb', [DhlController::class, 'generateAwb'])->name('dhl.generate-awb');
    //Aramex
    Route::get('aramex-index', [AramexController::class, 'index'])->name('aramex.index');

    //Ecom
    Route::get('ecom-index', [EcomController::class, 'index'])->name('ecom.index');

    //Outbound load recieve
    Route::get('loadreceive-email-index', [LoadReceiveEmailController::class, 'index'])->name('loadreceive.email.index');
    Route::post('/load-notification-store', [LoadReceiveEmailController::class, 'store'])->name('load.notification.store');

    //bulk upload
    Route::get('bulk-upload-index', [BulkUploadController::class, 'index'])->name('bulk-upload.index');
    Route::post('/bulk-store', [BulkUploadController::class, 'store'])->name('bulk.store');
    Route::post('importExcel', [BulkUploadController::class, 'importExcel'])->name('importExcel');

    Route::get('pickup-register-index', [PickUpRegisterController::class, 'index'])->name('pickup-register.index');

    Route::get('pickup-drs-index', [PickupDrsController::class, 'index'])->name('pickup-drs.index');
    Route::get('getdata', [PickupDrsController::class, 'getdata'])->name('getdata');
    Route::get('print', [PickupDrsController::class, 'print'])->name('print');

    Route::get('cash-entry-index', [CashEntryController::class, 'index'])->name('cash-entry.index');

    Route::get('cash-register-index', [CashRegisterController::class, 'index'])->name('cash-register.index');

    Route::get('agent-manifest-index', [AgentManifestController::class, 'index'])->name('agent-manifest.index');

    Route::get('hubscan-index', [HubscanController::class, 'index'])->name('hubscan.index');

    Route::get('send-email-awbno-index', [SendEmailAwbnoController::class, 'index'])->name('send-email-awbno.index');

    //Operation
    Route::get('custom-invoice-index', [CustomInvoiceController::class, 'index'])->name('custom-invoice.index');

    Route::get('awb-print-index', [AwbPrintController::class, 'index'])->name('awb-print.index');

    Route::get('dummies-index', [DummiesController::class, 'index'])->name('dummies.index');

    Route::get('bagging-index', [BaggingController::class, 'index'])->name('bagging.index');

    Route::get('bag-report-index', [BagReportController::class, 'index'])->name('bag-report.index');

    Route::get('clubbing-index', [ClubbingController::class, 'index'])->name('clubbing.index');

    Route::get('shipping-bill-index', [ShippingBillController::class, 'index'])->name('shipping-bill.index');

    Route::get('export-manifest-index', [ExportManifestController::class, 'index'])->name('export-manifest.index');

    Route::get('message-sheet-index', [MessageSheetController::class, 'index'])->name('message-sheet.index');
    Route::get('dummy-report-index', [DummyReportController::class, 'index'])->name('dummy-report.index');

    //message-sheet
    Route::post('message-sheet-add', [MessageSheetController::class, 'store'])->name('message-sheet.add');
    Route::get('message-sheet-list', [MessageSheetController::class, 'list'])->name('message-sheet.list');
    // Route::get('message-sheet-delete/{id}', [MessageSheetController::class, 'destory'])->name('message-sheet.delete');
    Route::post('/search.counterpart', [MessageSheetController::class, 'searchcounterpart'])->name('search.counterpart');
    Route::get('delete-sheet/{id}', [MessageSheetController::class, 'destroy']);

    //Inbound
    Route::get('fedex-label-import-index', [FedexLabelImportController::class, 'index'])->name('fedex-label-import.index');

    Route::get('data-entry-index', [DataEntryController::class, 'index'])->name('data-entry.index');

    Route::get('flight-update-index', [FlightUpdateController::class, 'index'])->name('flight-update.index');

    Route::get('inbound-hubscan-index', [InboundHubscanController::class, 'index'])->name('inbound-hubscan.index');

    Route::get('delivery-run-sheet-index', [DeliveryRunSheetController::class, 'index'])->name('delivery-run-sheet.index');

    Route::get('branch-manifest-index', [BranchManifestController::class, 'index'])->name('branch-manifest.index');
    Route::get('agent-manifest-index', [AgentManifestController::class, 'index'])->name('agent-manifest.index');
    Route::get('cod-collection-index', [CodCollectionController::class, 'index'])->name('cod-collection.index');
    Route::get('edi-excel-import-index', [EdiExcelImportController::class, 'index'])->name('edi-excel-import.index');

    //Account
    Route::get('payment-entry-index', [PaymentEntryController::class, 'index'])->name('payment-entry.index');
    Route::get('payment-summary-index', [PaymentSummaryController::class, 'index'])->name('payment-summary.index');
    Route::get('account-ledger-index', [AccountLedgerController::class, 'index'])->name('account-ledger.index');
    Route::get('outstanding-report-index', [OutstandingReportController::class, 'index'])->name('outstanding-report.index');

    //Setting

    Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');

    //usertype
    Route::get('/user-type', [UserTypeController::class, 'index'])->name('user.type');
    Route::post('/user-type-add', [UserTypeController::class, 'store'])->name('user.type.add');
    Route::get('/user-type-list', [UserTypeController::class, 'list'])->name('user.type.list');
    Route::post('/user-type-delete', [UserTypeController::class, 'destroy'])->name('delete-user-type');

    //franchises
    Route::post('/franchises', [FranchiseController::class, 'store'])->name('franchises.store');
    Route::get('/franchises-delete', [FranchiseController::class, 'destroy'])->name('delete-franchises');
    Route::get('/franchises-list', [FranchiseController::class, 'list'])->name('franchises.list');

    //pickup drs
    Route::post('/pickup-store', [PickupDrsController::class, 'store'])->name('pickup.store');

    Route::get('franchise-index', [FranchiseController::class, 'index'])->name('franchise.index');
    Route::get('user-registration-index', [UserController::class, 'registration'])->name('user-registration.index');
    Route::get('user-list-index', [UserController::class, 'list'])->name('user-list.index');
    Route::get('employee-list-index', [EmployeeDetailController::class, 'employeeList'])->name('employee-list.index');
    Route::get('awb-log-index', [AwbLogController::class, 'index'])->name('awb-log.index');
    Route::get('change-password-index', [ChangePasswordController::class, 'index'])->name('change-password.index');
    Route::get('login-audit-index', [LoginAuditController::class, 'index'])->name('login-audit.index');
    Route::get('api-user-index', [ApiUserController::class, 'index'])->name('api-user.index');

    //cash entry
    Route::post('cash-data', [CashEntryController::class, 'store'])->name('cash-add');

    // Search client / Customer
    Route::post('search-client-automation', [CommonController::class, 'searchClientAutomation'])->name('search.client.automation');

    // Search State
    Route::post('search-from-state', [CommonController::class, 'searchFromState'])->name('search.from.state');
    Route::post('search-from-city', [CommonController::class, 'searchFromCity'])->name('search.from.city');
    Route::post('search-from-country', [CommonController::class, 'searchFromCountry'])->name('search.from.country');

    // Commodity Routes
    Route::get('commodity-index', [CommodityController::class, 'index'])->name('commodity.index');
    Route::post('commodity-add', [CommodityController::class, 'add'])->name('commodity.add');
    Route::post('commodity-search', [CommodityController::class, 'search'])->name('commodity.search');
    Route::get('commodity-list', [CommodityController::class, 'list'])->name('commodity.list');
    Route::get('commodity-export', [CommodityController::class, 'export'])->name('commodity.export');

    // search city with no param
    Route::post('/city-search-with-no-param', [CustomerAccountController::class, 'searchCityWithNoPram'])->name('search.city.with.no.param');

    //search customer
    Route::post('/search-customer', [CashEntryController::class, 'searchCustomer'])->name('search.customer');

    // Client Onboarding
    Route::get('clientOnboarding-index', [OnboardingController::class, 'index'])->name('clientOnboarding-index');
    Route::post('clientOnboarding-add', [OnboardingController::class, 'add'])->name('clientOnboarding.add');
    Route::post('clientOnboarding-send-mail', [OnboardingController::class, 'sendOnboardingMail'])->name('client.onboarding.send.mail');

    //payment entry
    Route::post('add-data', [PaymentEntryController::class, 'store'])->name('add-data');


});

//forrgot password
Route::get('forget-password', [ForgotPasswordController::class, 'ForgetPassword'])->name('ForgetPasswordGet');
Route::post('forget-password', [ForgotPasswordController::class, 'ForgetPasswordStore'])->name('ForgetPasswordPost');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'ResetPassword'])->name('ResetPasswordGet');
Route::post('reset-password', [ForgotPasswordController::class, 'ResetPasswordStore'])->name('ResetPasswordPost');

//Logout
Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);
