<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use App\Helper\CustomHelper;
use App\Models\CurrencyExchangeMaster;
use Excel;
use Illuminate\Http\Request;
use Validator;

class CurrencyExchangeMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->search;
        if (!empty($search)) {
            $check_data = CurrencyExchangeMaster::orWhere('currency', 'like', '%' . $search . '%')->first();
            $return = array();
            if (!empty($check_data)) {
                $return['id'] = $check_data->id;
                $return['currency'] = $check_data->currency;
                $return['amount'] = $check_data->amount;
                $return['from_date'] = $check_data->from_date;
                $return['to_date'] = $check_data->to_date;
                $return['status'] = '200';
                $return['message'] = 'Currency Exchange Found!';
            } else {
                $return['id'] = '';
                $return['curreny'] = '';
                $return['amount'] = '';
                $return['from_date'] = '';
                $return['to_date'] = '';
                $return['status'] = '400';
                $return['message'] = 'Currency does not exist!';
            }
            return json_encode($return);
        }

        return view('admin.currency_exchange.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function list() {

        $currency = cache('currency', function () {
            return CurrencyExchangeMaster::paginate(10);
        });
        return view('admin.currency_exchange.list', [
            'currency' => $currency,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currency = $request->all();
        if (!empty($request->id)) {
            $rules = [
                'currency' => 'required|max:20|unique:currency_exchange_masters,currency,' . $request->id,
                'amount' => 'required',
                'from_date' => 'required',
                'to_date' => 'required',
            ];

            $validation = Validator::make($currency, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/currencyexchange-index')->withErrors($messages);
            }

            $currecny = CurrencyExchangeMaster::find($request->id);
            $currecny->currency = $request->currency;
            $currecny->amount = $request->amount;
            $currecny->from_date = $request->from_date;
            $currecny->to_date = $request->to_date;

            $currecny->save();
        } else {
            $rules = [
                'currency' => 'required|unique:currency_exchange_masters|max:20',
                'amount' => 'required',
                'from_date' => 'required',
                'to_date' => 'required',
            ];

            $validation = Validator::make($currency, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/currencyexchange-index')->withErrors($messages)->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $currency = new CurrencyExchangeMaster([
                "currency" => $request->currency,
                "amount" => $request->amount,
                "from_date" => $request->from_date,
                "to_date" => $request->to_date,
            ]);
            $currency->save();
        }
        return redirect('/currencyexchange-index')->with('success', 'Currency Exchange added successfully!');
    }

    //currency export
    public function export()
    {
        $headArr[] = array('Currency', 'Amount', 'Frome Date', 'To Date', 'Created Date', 'Updated Date');
        $data = CurrencyExchangeMaster::select('currency', 'amount', 'from_date', 'to_date', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
        $dataArr[] = array();
        foreach ($data as $dataRow) {
            $dataArr[] = array($dataRow->currency, $dataRow->amount, $dataRow->from_date, $dataRow->too_date, $dataRow->created_at, $dataRow->updated_at);
        }

        $export = new ExportData($headArr, $dataArr);
        return Excel::download($export, 'currency_exchnage.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CurrencyExchangeMaster  $currencyExchangeMaster
     * @return \Illuminate\Http\Response
     */
    public function show(CurrencyExchangeMaster $currencyExchangeMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CurrencyExchangeMaster  $currencyExchangeMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(CurrencyExchangeMaster $currencyExchangeMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CurrencyExchangeMaster  $currencyExchangeMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CurrencyExchangeMaster $currencyExchangeMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CurrencyExchangeMaster  $currencyExchangeMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $currencyExchange = CurrencyExchangeMaster::find($id);
        if ($currencyExchange) {
            $currencyExchange->delete();
            return redirect('/currencyexchange-index')->with('danger', 'Currency Exchange deleted successfully!');
        } else {
            return redirect('/currencyexchange-index')->with('danger', 'Data Not Found!');
        }
    }
}
