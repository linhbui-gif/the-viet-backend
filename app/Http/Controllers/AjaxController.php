<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Banner;
use App\Contact;
use Mail;
class AjaxController extends Controller
{
    public function ajaxClient(Request $request){
        $id = $request->id;
        $data = Banner::find($id);
        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $data
        ]);
    }
    public function ajaxPopup(Request $request){
       $contact = new Contact();
       $contact->fullname = $request->name;
       $contact->phone = $request->phone;
       $contact->email = $request->email;
//       $contact->content = $request->content;
       $result = $contact->save();
       if ($result){
           $email = $request->email;
           $name = $request->name;
           $array = [
               'name'=> $name,
               'email'=> $email
           ];
           Mail::send('enduser.mail.resetPassword', $array, function($message) use ($array){
               $message->to($array['email'], $array['name'])->bcc('linhbq68@wru.vn','Thông báo dành cho Admin')->subject('Gửi thông tin thành công,chúng tôi sẽ liên hệ với bạn sớm nhất !!');
           });
           return response()->json([
               'success' => true,
               'status' => 200,
               'message'=> "Lưu thông tin thành công",
               'data' => [],
           ]);
       }
       else{
           return response()->json([
               'success' => true,
               'status' => 404,
               'message'=> "Lưu thông tin thất bại",
               'data' => [],
           ]);
       }
    }
}
