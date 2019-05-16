<?php

namespace App\TraitsFolder;

use Illuminate\Support\Facades\Input;
use ReCaptcha\ReCaptcha;
use App\ProductCombination;
use App\ProductCombinationDetail;
use App\ProductOptions;
use App\BasicSetting;
use App\Order;
use App\OrderItem;
use App\User;
use App\UserDetails;
use App\Promotions;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Product;
trait CommonTrait
{
    public function __construct()
    {
        // $transport = (new \Swift_SmtpTransport("smtp.mailtrap.io", 2525))
        // ->setUsername("0df399d869fd01")
        // ->setPassword("5002d5447a2bed")
        // ->setEncryption("tls");
        // Mail::setSwiftMailer(new \Swift_Mailer($transport));
    }

    public function captchaCheck()
    {

        $response = Input::get('g-recaptcha');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = env('RE_CAP_SECRET');

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return 1;
        } else {
            return 0;
        }

    }

  
    public function registerEmail($firstname,$lastname,$email)
    {
        $basic = BasicSetting::first();
        $mail_val = [
            'name' => $firstname.' '.$lastname,
            'email' => $email,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Verification Email',
        ];    
        $name = $firstname.' '.$lastname;
        $site_title = $basic->title;
        Mail::send('emails.email-register', ['site_title'=>$site_title,'name'=>$name], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        });

    }

    
    public function sendMail($email,$name,$subject,$text){
        $basic = BasicSetting::first();
        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => $subject,
        ];

        $body = $basic->email_body;
        $body = str_replace("{{name}}",$name,$body);
        $body = str_replace("{{message}}",$text,$body);

        Mail::send('emails.email', ['body'=>$body], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        });

    }

    public function sendSms($to,$text){
        $basic = BasicSetting::first();
        $appi = $basic->smsapi;
        $text = urlencode($text);
        $appi = str_replace("{{number}}",$to,$appi);
        $appi = str_replace("{{message}}",$text,$appi);
        $result = file_get_contents($appi);
    }

    public function sendContact($email,$firstname,$lastname,$message,$phone)
    {
        $basic = BasicSetting::first();
        $mail_val = [
            'name' => $firstname.' '.$lastname,
            'email' => $email,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Troutfitter - Customer Support',
        ];         
        $site_title = $basic->title;
        $contact_number = $basic->phone;
        Mail::send('emails.email', 
        [
            'email_subject'=>'Your request has been successfully submitted. We will get back to you soon.','name'=>$firstname,
            'contact_number'=>$contact_number,
            'site_title'=>$site_title
        ], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        });
    }

    public function sendReturnPolicy($email,$name)
    {
        $basic = BasicSetting::first();
        $mail_val = [
            'name' => $name,
            'email' => $email,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Troutfitter - Customer Support',
        ];         
        $site_title = $basic->title;
        $contact_number = $basic->phone;
        Mail::send('emails.return', 
        [
            'email_subject'=>'Your request has been successfully submitted. We will get back to you soon.',
            'site_title'=>$site_title
        ], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        });
    }

    

    public function sendReturnEmail($email,$order_items,$order,$users)
    {
        $basic = BasicSetting::first();
        $mail_val = [
            'email' => $email,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Return Request',
        ];         
        $site_title = $basic->title;

        $logoUrl = asset('assets/images/logo.png');
        $invoiceNumber = $order->id;
        $invoiceDate = Carbon::parse($order->created_at)->format('F d, Y - h:i A');
        $companyDetails = $basic->title."<br>".$basic->phone."<br>".$basic->address;
        $userDetails = $email;
        $subtotal = $basic->symbol.$order_items->price;
       
        $productName = Product::where('id',$order_items->product_id)->select('name','current_price')->first();
        $items = '<tr class="item">
                <td>
                    '.$productName->name.'
                </td>
                <td style="text-align:center">
                    '.$basic->symbol.$productName->current_price.'
                </td>
                <td style="text-align:center">
                    '.$order_items->qty.'
                </td>
                <td>
                    '.$basic->symbol.($order_items->price*$order_items->qty).'
                </td>
            </tr>';

        Mail::send('emails.returnEmail', 
        [
            'email_subject'=>'Your request has been successfully submitted. We will get back to you soon.',
            'site_title'=>$site_title,
            'logoUrl'=>$logoUrl,
            'invoiceNumber'=>$invoiceNumber,
            'invoiceDate'=>1,
            'userDetails'=>$userDetails,
            'companyDetails'=>$companyDetails,
            'subtotal'=>$subtotal,
            'items'=>$items
        ], function ($m) use ($mail_val) {
            $m->from($mail_val['email']);
            $m->to($mail_val['g_email'], $mail_val['g_title'])->subject($mail_val['subject']);
        });
    }

    
    public function sendSupportEmail($email,$firstname,$lastname,$message)
    {
        $basic = BasicSetting::first();
        $mail_val = [
            'name' => $firstname.' '.$lastname,
            'email' => $email,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'message' => $message,
            'subject' => 'Customer Support',
        ];  
        $contact_number = $basic->phone;
        $site_title = $basic->title;
        Mail::send('emails.email-support', 
        [
            'email_body'=>$message,
            'site_title'=>$site_title,
            'name'=>$firstname.' '.$lastname
        ], function ($m) use ($mail_val) {
            $m->from($mail_val['email'], $mail_val['name']);
            $m->to($mail_val['g_email'], $mail_val['g_title'])->subject($mail_val['subject']);
        });
    }

    public function userPasswordReset($email,$name,$route)
    {     
        $basic = BasicSetting::first();
        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Troutfitter - Password Reset Request',
        ];
        $reset = DB::table('password_resets')->whereEmail($email)->count();
        $token = Str::random(40);
        $bToken = bcrypt($token);
        $url = route($route,$token);
        if ($reset == 0){
            DB::table('password_resets')->insert(
                ['email' => $email, 'token' => $bToken]
            );
            Mail::send('emails.reset-email', ['name' => $name,'link'=>$url,'footer'=>$basic->copy_text], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            });
        }else{
            DB::table('password_resets')
                ->where('email', $email)
                ->update(['email' => $email, 'token' => $bToken]);
            Mail::send('emails.reset-email', ['name' => $name,'link'=>$url,'footer'=>$basic->copy_text], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            });
        }
    }

    public static function viewRating($rating)
    {
        if ($rating == 0){
            return '<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>';
        }elseif ($rating == 1){
            return '<i class="fa fa-star active"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>';
        }elseif ($rating == 2){
            return '<i class="fa fa-star active"></i> <i class="fa fa-star active"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>';
        }elseif ($rating == 3){
            return '<i class="fa fa-star active"></i> <i class="fa fa-star active"></i> <i class="fa fa-star active"></i>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>';
        }elseif ($rating == 4){
            return '<i class="fa fa-star active"></i> <i class="fa fa-star active"></i> <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i> <i class="fa fa-star"></i>';
        }else{
            return '<i class="fa fa-star active"></i> <i class="fa fa-star active"></i> <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i> <i class="fa fa-star active"></i>';
        }
    }

    public function friendEmail($name, $ownEmail, $friendEmail, $url)
    {
        $basic = BasicSetting::first();
        $mail_val = [
            'email' => $friendEmail,
            'name' => $name,
            'g_email' => $ownEmail,
            'g_title' => $basic->title,
            'subject' => "Shared Product via Email",
        ];

        $urText = '<a href="'.$url.'">Product URL : '.$url.'</a></br>';
        $body = $basic->email_body;
        $body = str_replace("{{name}}",$name,$body);
        $body = str_replace("{{message}}",$urText,$body);

        Mail::send('emails.email', ['body'=>$body], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        });
    }

    public function sendInvoice($userId, $orderId)
    {
        $basic = BasicSetting::first();
        $user = User::findOrFail($userId);
        $userDetails = UserDetails::whereUser_id($userId)->first();
        $order = Order::findOrFail($orderId);
        $mail_val = [
            'email' => $user->email,
            'name' => $user->first_name.' '.$user->last_name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Your order # '.$order->id.' has been received',
        ];


        $items = null;

        $logoUrl = asset('assets/images/logo.png');
        $invoiceNumber = $order->id;
        $invoiceDate = Carbon::parse($order->created_at)->format('F d, Y - h:i A');
        $companyDetails = $basic->title."<br>".$basic->phone."<br>".$basic->address;
        $userDetails = $userDetails->b_name."<br>".$userDetails->b_number."<br>".$userDetails->b_email."<br>".$userDetails->b_address."<br>".$userDetails->b_city.','.$userDetails->b_state.','.$userDetails->b_country;
        $paymentUrl = route('payment',$order->order_number);
        $subtotal = $basic->symbol.$order->subtotal;
        if($order->discount_amount_coupon != '' || $order->discount_amount_coupon != null):
        $discount_amount_coupon = $basic->symbol.$order->discount_amount_coupon;
        else:
            $discount_amount_coupon = '';
        endif;
        $total = $basic->symbol.number_format($order->total,2);

        $shipping = $basic->symbol.number_format($order->shipping,2);

        $discount = $basic->symbol.number_format($order->discount,2);
        $totalTax = $basic->symbol.$order->tax;
        $tax = $basic->tax;
        $minute = $basic->expire_time;
        $site_title = $basic->title;
        $site_email = $basic->email;

        $orderItem = OrderItem::whereOrder_id($orderId)->with(['product','combination.details.options.attributes'])->get();
        foreach ($orderItem as $ot){
           if(!($ot->combination) && ($ot->product))
            { 
                if($ot->product->grandchildcategory_discount_percent != 0):
                    $discountpercent = $ot->product->grandchildcategory_discount_percent."% Off";
                    $prcs = (($ot->product->current_price/100)*(100-$ot->product->grandchildcategory_discount_percent)); 
                elseif($ot->product->subchildcategory_discount_percent != 0):
                    $discountpercent = $ot->product->subchildcategory_discount_percent."% Off";
                    $prcs = (($ot->product->current_price/100)*(100-$ot->product->subchildcategory_discount_percent)); 
                elseif($ot->product->childcategory_discount_percent != 0):
                    $discountpercent = $ot->product->childcategory_discount_percent."% Off";
                    $prcs = (($ot->product->current_price/100)*(100-$ot->product->childcategory_discount_percent)); 
                elseif($ot->product->subcategory_discount_percent != 0):
                    $discountpercent = $ot->product->subcategory_discount_percent."% Off";
                    $prcs = (($ot->product->current_price/100)*(100-$ot->product->subcategory_discount_percent)); 
                elseif($ot->product->category_discount_percent != 0):
                    $discountpercent = $ot->product->category_discount_percent."% Off";
                    $prcs = (($ot->product->current_price/100)*(100-$ot->product->category_discount_percent)); 
                else:
                    $discountpercent = '';
                    $prcs = $ot->product->current_price; 
                endif;
                // $productPrice = $prcs;

                $options ='';
                $productName = $ot->product->name.' ('.($discountpercent != ''? $discountpercent :'').')';
            }
            if(($ot->combination) && !($ot->product))
            {
                if($ot->combination->grandchildcategory_discount_percent != 0):
                    $discountpercent = $ot->combination->grandchildcategory_discount_percent."% Off";
                    $prcs = (($ot->combination->current_price/100)*(100-$ot->combination->grandchildcategory_discount_percent)); 
                elseif($ot->combination->subchildcategory_discount_percent != 0):
                    $discountpercent = $ot->combination->subchildcategory_discount_percent."% Off";
                    $prcs = (($ot->combination->current_price/100)*(100-$ot->combination->subchildcategory_discount_percent)); 
                elseif($ot->combination->childcategory_discount_percent != 0):
                    $discountpercent = $ot->combination->childcategory_discount_percent."% Off";
                    $prcs = (($ot->combination->current_price/100)*(100-$ot->combination->childcategory_discount_percent)); 
                elseif($ot->combination->subcategory_discount_percent != 0):
                    $discountpercent = $ot->combination->subcategory_discount_percent."% Off";
                    $prcs = (($ot->combination->current_price/100)*(100-$ot->combination->subcategory_discount_percent)); 
                elseif($ot->combination->category_discount_percent != 0):
                    $discountpercent = $ot->combination->category_discount_percent."% Off";
                    $prcs = (($ot->combination->current_price/100)*(100-$ot->combination->category_discount_percent)); 
                else:
                    $discountpercent = '';
                    $prcs = $ot->combination->current_price; 
                endif;
                $options = Array();
                foreach($ot->combination->details as $key => $detail)
                {
                    $options[] = $detail->options->attributes->attributename.':'.$detail->options->option_name;
                }
                $options = implode("<br/>", $options);
                $productName = $ot->combination->name.' ('.($discountpercent != '' ? $discountpercent : '').')';
            } 
            $productPrice = $prcs;
            
            $productSub = $basic->symbol.($ot->qty*$productPrice);
            $items .= '<tr class="item">
                    <td style="font-weight: 550;">
                        '.$productName.'<br/><span style="font-size: 12px; text-align: left; font-weight: 700; color: #063954;">'.$options.'
                        </span><br/>
                    </td>
                    <td style="text-align:center">
                        '.$basic->symbol.$productPrice.'
                    </td>
                    <td style="text-align:center">
                        '.$ot->qty.'
                    </td>
                    <td>
                        '.$productSub.'
                    </td>
                </tr>';
        }

        
            Mail::send('emails.invoice', [
                'logoUrl'=>$logoUrl,
                'invoiceNumber'=>$invoiceNumber,
                'invoiceDate' => $invoiceDate,
                'companyDetails' => $companyDetails,
                'userDetails' => $userDetails,
                'paymentUrl' => $paymentUrl,
                'site_title' => $site_title,
                'site_email' => $site_email,
                'subtotal' => $subtotal,
                'total' => $total,
                'totalTax' => $totalTax,
                'discount' => $discount,
                'tax' => $tax,
                'items' => $items,
                'minute' => $minute,
                'shipping'=> $shipping,
                'discount_amount_coupon'=>$discount_amount_coupon

            ], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            // })->withSwiftMessage(function ($message) {
            //     $message->getHeaders()
            //             ->addTextHeader('x-mailgun-native-send', 'true');
            });
            
    }

    public function paymentConfirm($userId, $amount,$custom, $type)
    {
        // dd($userId);

        $basic = BasicSetting::first();
        $user = User::findOrFail($userId);
        $mail_val = [
            'email' => $user->email,
            'name' => $user->first_name.' '.$user->last_name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => "Your order has been received",
        ]; 


        $url = route('order-complete',$custom);
     
        $body = $basic->email_body;
        $contact_number = $basic->phone;
        $body = str_replace("{{name}}",$user->first_name.' '.$user->last_name,$body);
        $body = str_replace("{{site_title}}",$basic->title,$body);
        
        Mail::send('emails.order-confirm', ['body'=>$body,'name'=>$user->first_name.' '.$user->last_name,$body,'site_title'=>$basic->title,'contact_number'=>$contact_number,'email'=>$mail_val['g_email'] ], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        }); 
    }
    public function sendTrackingNumberEmail($userId, $orderId)
    {
        $basic = BasicSetting::first();
        $user = User::findOrFail($userId);
        $userDetails = UserDetails::whereUser_id($userId)->first();
        $order = Order::findOrFail($orderId);
        $mail_val = [
            'email' => $user->email,
            'name' => $user->first_name.' '.$user->last_name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Your order # '.$orderId.' has been shipped',
        ];

        $orderId = $order->id;
        $customer_name = $user->first_name.' '.$user->last_name;
        $tracking_number = $order->tracking_number;
        $site_title = $basic->title;
            Mail::send('emails.Email_TrackingNumber', [
                'site_title'=> $site_title,
                'orderId'=> $orderId,
                'customer_name'=> $customer_name,
                'tracking_number'=>$tracking_number

            ], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            // })->withSwiftMessage(function ($message) {
            //     $message->getHeaders()
            //             ->addTextHeader('x-mailgun-native-send', 'true');
            });
            
    }
}