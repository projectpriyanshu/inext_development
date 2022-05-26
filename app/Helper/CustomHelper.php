<?php

namespace App\Helper;

use Illuminate\Http\Request;
use App\Models\City;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;

class CustomHelper
{
    public static function encrypt($data = null)
    {
        $password = 'Tq5u33F5ezQDorIi984nRHEu/qlOJj3/VXI7jvCfQ0w=';

        // CBC has an IV and thus needs randomness every time a message is encrypted
        $method = 'AES-256-CBC';

        // Must be exact 32 chars (256 bit)
        // You must store this secret random key in a safe place of your system.
        $key = substr(hash('sha256', $password, true), 0, 32);

        // Most secure key
        //$key = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));

        // IV must be exact 16 chars (128 bit)
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

        // Most secure iv
        // Never ever use iv=0 in real life. Better use this iv:
        // $ivlen = openssl_cipher_iv_length($method);
        // $iv = openssl_random_pseudo_bytes($ivlen);

        // av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
        $encrypted = base64_encode(openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv));

        return $encrypted;
    }

    public static function decrypt($data = null)
    {
        $password = 'Tq5u33F5ezQDorIi984nRHEu/qlOJj3/VXI7jvCfQ0w=';
        // CBC has an IV and thus needs randomness every time a message is encrypted
        $method = 'AES-256-CBC';

        // Must be exact 32 chars (256 bit)
        // You must store this secret random key in a safe place of your system.
        $key = substr(hash('sha256', $password, true), 0, 32);

        // IV must be exact 16 chars (128 bit)
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
        $decrypted = openssl_decrypt(base64_decode($data), $method, $key, OPENSSL_RAW_DATA, $iv);

        return $decrypted;
    }

    public static function random_strings($length_of_string)
    {

        // String of all alphanumeric character 
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // Shufle the $str_result and returns substring 
        // of specified length 
        return substr(str_shuffle($str_result), 0, $length_of_string);
    }

    public static function random_number()
    {
        $otp = rand(1000, 9999);
        return $otp;
    }

    /**
     * @var $string
     * Return data
     */
    public static function getSlugOfString($string = null)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
        return $slug;
    }

    /**
     * @var $string
     * Return data
     */
    public function getSlugOfStringWithUnderscore($string = null)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $string)));
        return $slug;
    }

    public static function TableToArray($arrlop, $field1, $field2)
    {
        $arr1 = array();
        $arr2 = array();
        $f_arr = array();
        foreach ($arrlop as $key => $value) {
            $arr1[] = $value->$field1;
        }
        foreach ($arrlop as $key => $value) {
            $arr2[] = $value->$field2;
        }
        $f_arr = array_combine($arr1, $arr2);
        $f_arr[0] = 'Default';
        return $f_arr;
    }

    public static function random_strings_number($length_of_string)
    {

        // String of all alphanumeric character 
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_number = rand(100000, 999999);
        $random_string = substr(str_shuffle($str_result), 0, $length_of_string);

        $final = $random_string . $random_number;

        // Shufle the $str_result and returns substring 
        // of specified length 
        return $final;
    }

    public static function randomStringsWithoutSpecialCharacter($length_of_string)
    {

        // String of all alphanumeric character 
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // Shufle the $str_result and returns substring 
        // of specified length 
        return substr(str_shuffle($str_result), 0, $length_of_string);
    }

    public static function getIndianCurrency(float $number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(
            0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety'
        );
        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'crore');
        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
    }

    public static function SendSMS($number, $msg)
    {
        // Account details
        //$apiKey = urlencode('mC7nzlbIyBc-WxF17JmGpjJsDmITJaxOFf7LCkkkaX');
        $apiKey = urlencode('Ie2mXZxAYNs-nCwaQZjafKLfz2yBP97OphOeXaOSgA');
        // Message details
        $numbers = $number;
        $sender = urlencode('DRMIMP');
        //$message = rawurlencode('Your OTP is : '.$otp);
        $message = rawurlencode($msg);

        //print_r($msg);exit;
        //$numbers = implode(',', $numbers);

        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $decodde_responce = json_decode($response);
        $response_status = $decodde_responce->status;
        $final = array();

        if ($response_status == 'failure' || $response_status == '400') {
            $final['status'] = 400;
            $final['message'] = $decodde_responce->errors[0]->message;
        } else {
            $final['status'] = 200;
            $final['message'] = 'SMS Sent Successfully!';
        }
        //print_r($final);exit;
        return $final;
        curl_close($ch);
    }

    public static function calculateHour($date1, $date2)
    {
        $timestamp1 = strtotime($date1);
        $timestamp2 = strtotime($date2);
        $hour = abs($timestamp2 - $timestamp1) / (60 * 60);
        return $hour;
    }

    public static function searchCity($search)
    {
        if ($search == '') {
            $check_data = City::orderby('city_name', 'asc')
                ->select('cities.code as city_code', 'cities.name as city_name', 'states.code as state_code', 'states.name as state_name')
                ->join('states', 'states.id', 'cities.state_id')
                ->get();
        } else {
            $check_data = City::orderby('city_name', 'asc')
                ->select('cities.code as city_code', 'cities.name as city_name', 'states.code as state_code', 'states.name as state_name')
                ->join('states', 'states.id', 'cities.state_id')
                ->where('cities.name', 'like', '%' . $search . '%')->get();
        }

        $response = array();
        foreach ($check_data as $data) {
            $response[] = array("city_code" => $data->city_code, "label" => $data->city_name, "state_code" => $data->state_code, "state" => $data->state_name);
        }

        return response()->json($response);
    }


    public static function exportTextCenter(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $event->sheet->styleCells(
                    'A1:Z26',
                    [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        ],
                    ]
                );
            },
        ];
    }
}
