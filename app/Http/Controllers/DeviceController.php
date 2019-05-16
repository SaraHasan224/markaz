<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth, Tymon\JWTAuth\Payload;
use Validator;
use App\Http\Controllers\Controller;
use App\Data\Repositories\DeviceTokenRepository;
class DeviceController extends Controller
{
    private $_repository;

	public function __construct(DeviceTokenRepository $deviceTokenRepository) {
		//$this->_repository = app('DeviceTokenRepository');
		$this->_repository = $deviceTokenRepository;

    }
    
    public function setUserTokens(Request $request) {
    	$token = JWTAuth::getToken();
    	if ($token != '') {
			$claims = JWTAuth::decode($token);

			if ($claims instanceof Payload && $claims->get('sub')) {
				
				$input = $request->only('udid','token','type');
				
				$input['user_id'] = $claims->get('sub');

				$rules = ['user_id' => 'required|exists:users,id',
						  'udid' => 'required',
						  'token' => 'required',
						  'type' => 'required|in:ios,android'
						  ];

				$messages = ['user_id.required' => 'Please enter user id.',
							'user_id.exists' => 'Invalid user id.',
							'udid.required' => 'Please enter unique device id.',
							'token.required' => 'Please enter device token.',
							'type.required' => 'Please enter device type.',
							'type.in' => 'Device type can only be ios or android.'
							];

				$validator = Validator::make($input, $rules, $messages); 
				if($validator->fails()) {

					$code = 406;
					$output = ['error' => ['code' => $code, 'messages' => $validator->messages()->all() ]];
				}
				else {
					$response = $this->_repository->setUserTokens($input);

					if ($response == false) {
						$code = 406;
						$output = ['error'=>['code'=>$code,'messages'=>['An error occurred while adding user device tokens. Please try again.']]];
					} else {
						$status = 200;
						$output = ['response'=>['status'=>$status,'messages'=>['User device token has been added successfully.']]];
					}
					
				}
			} else {
				$code = 406;
				$output = ['error'=>['code'=>$code,'messages'=>['You don\'t have permission.']]];
			}
    	} else {
			$code = 406;
			$output = ['error'=>['code'=>$code,'messages'=>['You don\'t have permission.']]];
    	}

		return response()->json($output);
	}
}
