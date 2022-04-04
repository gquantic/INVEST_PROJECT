<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deposits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $until = Carbon::now()->addMonth($request->post('until'));
        echo $until;

        if (\Auth::user()->balance < $request->post('amount')) {
            return redirect()->back()->with('error', 'На Вашем балансе недостаточно средств.');
        }

        $deposit = new Deposit();
        $deposit->user_id = \Auth::id();
        $deposit->deposit_type = $request->post('deposit-type');
        $deposit->comment = $request->post('telegram');
        $deposit->amount = $request->post('amount');
        $deposit->deposit_until = $until;
        $deposit->save();

        User::where('id', '=', \Auth::id())->update([
            'balance' => \Auth::user()->balance - intval($request->post('amount'))
        ]);

        return redirect('home')->with('success', 'Депозит успешно создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
