<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;


class Home extends Controller
{
    protected function index(Request $req){
        // $this->send_sms('6200500903', "Jayant");
        // $c = PseudoCrypt::hash(12);
        // print_r($c);
        // echo "<br>";
        // print_r(PseudoCrypt::unhash($c));
        $data['saloons'] = User::where('status', TRUE)->get();
        return view('home.landing_page', $data);
    }

    protected function saloon(Request $req, $id){
        $data['saloon'] = User::findOrFail($id);
        return view('home.view',$data);
    }

    protected function booking(Request $req){
        if(User::find($req->user_id)->getOrder){
            $otp = mt_rand(1000,9999); 
            $order = new Order();
            $order->name = $req->name;
            $order->contact = $req->contact;
            $order->email = $req->email;
            $order->message = $req->message;
            $order->user_id = $req->user_id;
            $order->status = 0;
            $order->otp = $otp;
            $order->save();
            sleep(1);
            $o = Order::where([['user_id', $req->user_id], ['otp',$otp]])->first();
            // echo "<script>alert('$o->id')</script>";
            $u = User::find($req->user_id);
            $this->send_sms($req->contact, "Hello $req->name, Your booking in $u->name is confirmed.\nYour OTP is $otp\nCheck your current queue status - https://saloon.co.in/check/".PseudoCrypt::hash($o->id));
        }
        return redirect()->back();
    }
    private function send_sms($number, $msg){
      $curl = curl_init();
      $authkey = "OQAwi7b2DNYRB0Z3m9fW5UaXc4uVSqznyJMtKFhHC86g1jLpsTeH0OGgQkJC7m4BjPUcyxr82dWYKI5h";
      $sender_id = "SALOON";
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/bulk?authorization=$authkey&sender_id=$sender_id&message=".urlencode($msg)."&language=english&route=p&numbers=".urlencode($number),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
      }
    }
}

class PseudoCrypt {

  /* Key: Next prime greater than 62 ^ n / 1.618033988749894848 */
  /* Value: modular multiplicative inverse */
  private static $golden_primes = array(
      '1'                  => '1',
      '41'                 => '59',
      '2377'               => '1677',
      '147299'             => '187507',
      '9132313'            => '5952585',
      '566201239'          => '643566407',
      '35104476161'        => '22071637057',
      '2176477521929'      => '294289236153',
      '134941606358731'    => '88879354792675',
      '8366379594239857'   => '7275288500431249',
      '518715534842869223' => '280042546585394647'
  );

  /* Ascii :                    0  9,         A  Z,         a  z     */
  /* $chars = array_merge(range(48,57), range(65,90), range(97,122)) */
  private static $chars62 = array(
      0=>48,1=>49,2=>50,3=>51,4=>52,5=>53,6=>54,7=>55,8=>56,9=>57,10=>65,
      11=>66,12=>67,13=>68,14=>69,15=>70,16=>71,17=>72,18=>73,19=>74,20=>75,
      21=>76,22=>77,23=>78,24=>79,25=>80,26=>81,27=>82,28=>83,29=>84,30=>85,
      31=>86,32=>87,33=>88,34=>89,35=>90,36=>97,37=>98,38=>99,39=>100,40=>101,
      41=>102,42=>103,43=>104,44=>105,45=>106,46=>107,47=>108,48=>109,49=>110,
      50=>111,51=>112,52=>113,53=>114,54=>115,55=>116,56=>117,57=>118,58=>119,
      59=>120,60=>121,61=>122
  );

  public static function base62($int) {
      $key = "";
      while(bccomp($int, 0) > 0) {
          $mod = bcmod($int, 62);
          $key .= chr(self::$chars62[$mod]);
          $int = bcdiv($int, 62);
      }
      return strrev($key);
  }

  public static function hash($num, $len = 4) {
      $ceil = bcpow(62, $len);
      $primes = array_keys(self::$golden_primes);
      $prime = $primes[$len];
      $dec = bcmod(bcmul($num, $prime), $ceil);
      $hash = self::base62($dec);
      return str_pad($hash, $len, "0", STR_PAD_LEFT);
  }

  public static function unbase62($key) {
      $int = 0;
      foreach(str_split(strrev($key)) as $i => $char) {
          $dec = array_search(ord($char), self::$chars62);
          $int = bcadd(bcmul($dec, bcpow(62, $i)), $int);
      }
      return $int;
  }

  public static function unhash($hash) {
      $len = strlen($hash);
      $ceil = bcpow(62, $len);
      $mmiprimes = array_values(self::$golden_primes);
      $mmi = $mmiprimes[$len];
      $num = self::unbase62($hash);
      $dec = bcmod(bcmul($num, $mmi), $ceil);
      return $dec;
  }

}