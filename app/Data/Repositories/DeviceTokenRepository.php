<?php

namespace App\Data\Repositories;

use App\Contracts\RepositoryContract;
use App\DeviceToken;
use Carbon\Carbon;

use \StdClass;


class DeviceTokenRepository extends AbstractRepository implements RepositoryContract {

	/**
	 *
	 * These will hold the instance of DeviceToken Class.
	 *
	 * @var object
	 * @access public
	 *
	 **/
	public $model;

	/**
	 *
	 * This is the prefix of the cache key to which the
	 * device tokens data will be stored
	 * Device Auto incremented Id will be append to it
	 *
	 * Example: device-token-1
	 *
	 * @var string
	 * @access protected
	 *
	 **/
	protected $_cacheKey = 'device-token-';


	public function __construct(DeviceToken $deviceTokens) {
		$this->model = $deviceTokens;
	}

	/**
	 *
	 * This method will set Device Tokens against given user
	 * and will return output back to client as json
	 *
	 * @access public
	 * @return mixed
	 *
	 * 
	 *
	 **/

	public function setUserTokens(array $data = []) {


		// to check if device type exist against user or not
		$userDeviceType = $this->model->where('user_id', '=', $data['user_id'])
													->where('type', '=', $data['type']);

		if ($userDeviceType->count() > 0) {

			$userDeviceType = $userDeviceType->first();

			// check if device udid is same as given udid or not

			if ($userDeviceType->udid == $data['udid']) {

				//  check if device token is same as given token or not
				if ($userDeviceType->token != $data['token']) {

					// update token
					$userDeviceType->token = $data['token'];
					$userDeviceType->updated_at = Carbon::now();
					return $userDeviceType->save();
				}

				return true;
			} else {
				$userDeviceType = $this->model->where('udid','=',$data['udid'])->where('type','=',$data['type']);
				if ($userDeviceType->count() > 0 ) {
					$userDeviceType = $userDeviceType->first();
					//  check if device token is same as given token or not
					if($userDeviceType != NULL) {
						// update token
						$userDeviceType->user_id = $data['user_id'];
						$userDeviceType->token = $data['token'];
						$userDeviceType->updated_at = Carbon::now();
						return $userDeviceType->save();
					}
				} else {
					// add user device type
					$this->model = new DeviceToken;
					$this->model->user_id = $data['user_id'];
					$this->model->udid = $data['udid'];
					$this->model->token = $data['token'];
					$this->model->type = $data['type'];
					if ($this->model->save()) {
						$this->model = new DeviceToken;
						return true;
					} else {
						return false;
					}
				}
			}
		} else {
			$userDeviceType = $this->model->where('udid','=',$data['udid'])->where('type','=',$data['type']);
			if ($userDeviceType->count() > 0 ) {
				$userDeviceType = $userDeviceType->first();
				//  check if device token is same as given token or not
				if($userDeviceType != NULL) {
					// update token
					$userDeviceType->user_id = $data['user_id'];
					$userDeviceType->token = $data['token'];
					$userDeviceType->updated_at = Carbon::now();
					return $userDeviceType->save();
				}
			} else {
				// add user device type
				$this->model = new DeviceToken;
				$this->model->user_id = $data['user_id'];
				$this->model->udid = $data['udid'];
				$this->model->token = $data['token'];
				$this->model->type = $data['type'];
				if ($this->model->save()) {
					$this->model = new DeviceToken;
					return true;
				} else {
					return false;
				}
			}

		}

	}

}
