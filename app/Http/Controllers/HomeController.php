<?php

namespace App\Http\Controllers;

use App\ZodiacDayRating;
use App\ZodiacSign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = " | Home";
        $current_year = date('Y');
        $today = date('Y-m-d');

        $res = ZodiacDayRating::where(DB::raw("(DATE_FORMAT(zodiac_date,'%Y'))"), "=", $current_year)->get();

        if(sizeof($res) == 0){
            $zodiacs = ZodiacSign::all();
            $this->new_year_zodia_data($current_year, $zodiacs);
        }

        $today_zodiacs = ZodiacDayRating::where('zodiac_date', $today)->get();

        return view('home', compact('title', 'today_zodiacs'));
    }

    public function new_year_zodia_data($current_year, $zodiacs) {
        
        $startDate = Carbon::createFromFormat('Y-m-d', $current_year.'-01-01');
        $endDate = Carbon::createFromFormat('Y-m-d', $current_year.'-12-31');

        $dates = [];

        while ($startDate->lte($endDate)) {

            $dates[] = $startDate->copy()->format('Y-m-d');

            $startDate->addDay();
        }

        foreach($zodiacs as $zodiac){
            foreach($dates as $date){
                
                $zodiac_sign_id = $zodiac->id;
                $zodiac_date = $date;
                $day_score = rand(1,10);

                $is_exist = ZodiacDayRating::where('zodiac_sign_id', $zodiac_sign_id)
                                            ->where('zodiac_date', $zodiac_date)
                                            ->get();

                if(sizeof($is_exist) == 0){
                    
                    $data[] = [
                        'zodiac_sign_id' => $zodiac_sign_id,
                        'zodiac_date' => $zodiac_date,
                        'day_score' => $day_score,
                        'created_at' => now()->toDateTimeString(),
                        'updated_at' => now()->toDateTimeString(),
                    ];
                    
                }

            }
        }
        
        ZodiacDayRating::insert($data);
    }
}
