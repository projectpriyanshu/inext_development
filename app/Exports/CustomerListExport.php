<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use App\Helper\CustomHelper;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CustomerListExport implements FromCollection, WithHeadings, WithMapping, WithEvents, WithStyles
{
    public $aadhar;
    public $gst;

    function __construct($aadhar, $gst)
    {
        $this->aadhar = $aadhar;
        $this->gst = $gst;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $aadhar = $this->aadhar;
        $gst = $this->gst;

        $data = DB::table('customer_accounts')
            ->join('customer_account_settings', 'customer_accounts.id', '=', 'customer_account_settings.customer_id')
            ->join('customer_addresses', 'customer_accounts.id', '=', 'customer_addresses.customer_id')
            ->join('customer_bank_details', 'customer_accounts.id', '=', 'customer_bank_details.customer_id')
            ->join('customer_credits', 'customer_accounts.id', '=', 'customer_credits.customer_id')
            ->join('customer_kyc_documents', 'customer_accounts.id', '=', 'customer_kyc_documents.customer_id')
            ->join('customer_managers', 'customer_accounts.id', '=', 'customer_managers.customer_id')
            ->join('customer_other_charges', 'customer_accounts.id', '=', 'customer_other_charges.customer_id')
            ->join('customer_portal_settings', 'customer_accounts.id', '=', 'customer_portal_settings.customer_id')
            ->join('customer_service_settings', 'customer_accounts.id', '=', 'customer_service_settings.customer_id')
            // ->select('customer_accounts.id','customer_accounts.name','customer_accounts.aadhar_no','customer_accounts.name')
            ->orWhere('customer_accounts.aadhar_no', $aadhar)
            ->orWhere('customer_accounts.gst_no', $gst)
            ->get();

        //dd($data);
        return $data;
        //return collect($data);

    }

    public function map($data): array
    {
        return [
            $data->id,
            $data->name,
            $data->code,
            $data->type,
            $data->serial_no1,
            $data->serial_no2,
            $data->business_type,
            $data->gst_no,
            $data->pan_no,
            $data->iec_no,
            $data->aadhar_no,
            $data->tariff,
            $data->gst,
            $data->activate,
            $data->billing,
            $data->payment,
            $data->currency, $data->contact_person, $data->address1, $data->state_code & $data->state, $data->country_code & $data->country, $data->branch_code & $data->branch,
            $data->telephone, $data->cs_email, $data->billing_email, $data->website, $data->account_no, $data->bank_name, $data->account_name, $data->ifsc, $data->bank_address, $data->branch_office,
            $data->opening_balance, $data->credit_balance, $data->credit_limit, $data->total_sale, $data->total_payment, $data->total_debit_note, $data->total_credit_note, $data->is_verified
        ];
    }

    public function headings(): array
    {
        return [
            '#', 'Name', 'Code', 'Type', 'Serial No1', 'Serial No2', 'Business Type', 'GST No', 'PAN No', 'IEC No', 'Aadhar No', 'Tariff', 'Account Activation',
            'Billing', 'Payment Type', 'Currency', 'Contact Person', 'Address', 'State Code & Name', 'Country Code & Name', 'Branch Code & Name', ' Telephone', 'CS Email Id', 'Billing Email', 'Website', 'Account No',
            'Bank Name', 'Account Name', 'IFSC Code', 'Bank Address', 'Branch Office', 'Opening Balance', 'Credit Balance', 'Credit Limit', 'Total Sale', 'Total Payment', 'Total Debit Note', 'Total Credit Note', 'Customer Kyc Status'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function registerEvents(): array
    {
        return CustomHelper::exportTextCenter();
    }
}
