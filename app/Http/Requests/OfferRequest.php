<?php namespace App\Http\Requests;

use Auth;

class OfferRequest extends Request
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
	    return [
	        'title' => 'required|max:255',
	        'content' => 'required',
	        'expires_at' => 'required|date_format:H:i d.m.Y'
	    ];
	}

	public function authorize() {
		return Auth::check();
	}
}