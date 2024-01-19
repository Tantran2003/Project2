<?php 

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BookingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'packageID' =>  'required|exists:products,id',
            'bookingDate' => 'required|date',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'youngChildren' => 'required|integer|min:0',
            'babies' => 'required|integer|min:0',
            'specialRequests' => 'nullable|string',
            'contactName' => 'required|string',
            'contactEmail' => 'required|email',
            'contactPhone' => 'required|string',
            'paymentMethod' => 'required|string',
        ];
    }
}
