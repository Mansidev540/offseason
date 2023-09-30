<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\ClubCalender;
use Exception;
use Stripe\Exception\CardException;
use Stripe\StripeClient;
use DB;
use Response;
use Auth;


class ClubCalenderController extends Controller
{
    private $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(env('STRIPE_SEC_KEY'));
    }

    public function index()
    {
        return view('club_calender.index');
    }
    public function add($date, $time, $rental)
    {


        $old_date = explode('-', $date);
        $newDate = $old_date[0] . '/' . $old_date[1] . '/' . $old_date[2];
        $time_select = $time;
        $rental_select = DB::table('rental')->where('id', $rental)->first();
        return view('club_calender.add', compact('newDate', 'time_select', 'rental_select'));
    }
    public function save(Request $request)
    {
        try {
            DB::beginTransaction();
            $calender = new ClubCalender();
            $club = DB::table('club')->where('user_id', Auth::user()->id)->first();

            $duration = 1;

            $athlete = DB::table('athlete')->where('id', $request->athlete_select)->first();
            $schedule8 = DB::table('schedule')->where('user_id', $athlete->user_id)->where('date', $request->date)->whereRaw('FIND_IN_SET(?, time)', [$request->time])->first();

            $trainer_rate = $schedule8->booking_rate;

            $rental = DB::table('rental')->where('id', $request->rental)->first();

            $booking_total = $trainer_rate + $rental->price;

            $booking_rate = $booking_total * 10 / 100;

            $total = $booking_total + $booking_rate;

            $calender->club_id = $club->id;
            $calender->user_id = $club->user_id;
            $calender->date = $request->date;
            $calender->time = $request->time;
            $calender->member_id = $request->member_select;
            $calender->roster_id = $request->athlete_select;
            $calender->service_id = $request->service;
            $calender->rental_id = $request->rental;
            $calender->duration = $duration;
            $calender->trainer_rate = $trainer_rate;
            $calender->booking_rate = $booking_rate;
            $calender->total = $total;
            $calender->schedule = 1;
            $calender->save();

            try {
                // $time=strtotime($request->card_date);
                // $month=date("F",$time);
                // $year=date("Y",$time);
                // $token = $this->createToken([
                //     'number' => $request->card_number,
                //     'month' => $month,
                //     'year' => $year,
                //     'cvv' => $request->card_cvv
                // ]);
                // if (!empty($token['error'])) {
                //     DB::rollback();
                //     $request->session()->flash('danger', $token['error']);
                //     return redirect()->back();
                // }
                // if (empty($token['id'])) {
                //     DB::rollback();
                //     $request->session()->flash('danger', 'Payment failed.');
                //     return redirect()->back();
                // }
                $total = $total * 100;
                $charge = $this->createCharge('tok_visa ', $total);
                
                if (!empty($charge)) {
                    // $request->session()->flash('success', 'Payment completed.');
                } else {
                    DB::rollback();
                    $request->session()->flash('danger', 'Payment failed.');
                    return redirect()->back();
                }
            } catch (\Exception $e) {
                DB::rollback();
                $request->session()->flash('danger',  $e->getMessage());
                return redirect()->back();
            }

            DB::commit();
            return redirect()->route('clubcalender.index');
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('danger',  $e->getMessage());
            return redirect()->back();
        }
    }

    private function createToken($cardData)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardData['number'],
                    'exp_month' => $cardData['month'],
                    'exp_year' => $cardData['year'],
                    'cvc' => $cardData['cvv']
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($tokenId, $amount)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $tokenId,
                'description' => 'My first payment'
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }


    public function edit($id)
    {
        $calender = DB::table('club_calender')->where('id', $id)->first();
        return view('club_calender.edit', compact('calender'));
    }
    public function update(Request $request)
    {
        $calender = ClubCalender::where('id', $request->calender_id)->first();
        $calender->schedule = 1;
        $calender->save();
        return redirect()->route('clubcalender.index');
    }
    public function date(Request $request)
    {
        $date = $request->date;
        return view('club_calender.index', compact('date'));
    }
    public function cancle(Request $request)
    {
        $calender_trainer = DB::table('club_calender')->where('id', $request->club_calender_id)->delete();
        $trainer = DB::table('trainer_calender')->where('club_calender_id', $request->club_calender_id)->delete();
        // dd($calender_trainer);
        // $calender_trainer->delete();
        return redirect()->route('clubcalender.index');
    }
    public function member_calender(Request $request)
    {
        // $member = DB::table('member')->where('id',$request->id)->first();
        // return Response::json($member); 
        $data['member'] = DB::table('member')->where('id', $request->id)->get();
        return response()->json($data);
    }
    public function tariner_calender(Request $request)
    {
        // $member = DB::table('member')->where('id',$request->id)->first();
        // return Response::json($member); 
        $data['member'] = DB::table('athlete')->where('id', $request->id)->get(["id", "athlete_name", "phone_no", "image"]);
        return response()->json($data);
    }
}
