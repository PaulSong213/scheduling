<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credentials;
use Auth;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $credentials = DB::table('credentials')
            ->join('users', 'credentials.user_id', '=', 'users.id')
            ->select('credentials.*', 'users.*')
            ->where('credentials.user_id', '=', Auth::user()->id)
            ->get();
        return view('request.index')
            ->with('credentials', $credentials);
    }

    public function credential($type)
    {
        return view('request.credential')
            ->with('type', $type);
    }

    public function permit()
    {
        return view('request.permit');
    }

    public function addCredential(Request $request)
    {

        $arr_payment_proof_filename = explode(".", $request->payment_proof_filename->getClientOriginalName());

        $payment_proof_filename_ext = $arr_payment_proof_filename[1];

        $request['payment_proof_filename_title'] = $this->randText();

        $payment_proof_full = $request['payment_proof_filename_title'] . '.' . $payment_proof_filename_ext;

        $request->payment_proof_filename->storeAs('public', $payment_proof_full);
        try {
            Credentials::create([
                'purpose' => $request->input('purpose'),
                'user_id' => Auth::user()->id,
                'payment_proof_filename' => $payment_proof_full,
                'status' => "pending",
                'credential_type' => $request->input('credential_type'),
            ]);
            return redirect('/request/success');
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return redirect()
                ->back()
                ->withInput($request->input())
                ->with('errorInfo', $errorInfo);
        }
    }

    public function randText($len = 17)
    {
        $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $txt = "";
        for ($i = 0; $i < $len; $i++) {
            $txt .= substr($str, rand(0, strlen($str)), 1);
        }
        return $txt;
    }
}
