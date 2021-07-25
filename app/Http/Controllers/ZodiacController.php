<?php

namespace App\Http\Controllers;

use App\ZodiacSign;
use App\ZodiacDayRating;
use App\ZodiacScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZodiacController extends Controller
{
    public function zodiacSigns(){
        $title = " | Zodiac Signs";

        $zodiac_signs = ZodiacSign::all();

        return view('zodiac_signs', compact('title', 'zodiac_signs'));
    }

    public function zodiacCalendar(){
        $title = " | Zodiac Calendar";

        $zodiac_signs = ZodiacSign::all();

        return view('zodiac_calendar', compact('title', 'zodiac_signs'));
    }

    public function getZodiacCalenderScore(Request $request){
        $zodiac_sign_id = $request->zodiac_sign_id;
        $zodiac_year_month = $request->zodiac_year_month;

        $zodiac_scores = ZodiacDayRating::where(DB::raw("(DATE_FORMAT(zodiac_date,'%Y-%m'))"), "=", $zodiac_year_month)
                        ->where('zodiac_sign_id', $zodiac_sign_id)
                        ->get();

        return view('zodiac_calendar_filter', compact('zodiac_scores'));
    }

    public function zodiacMonthlyAnalysis(){
        $title = " | Zodiac Monthly Analysis";

        $zodiac_signs = ZodiacSign::all();

        return view('zodiac_month_analysis', compact('title', 'zodiac_signs'));
    }

    public function getZodiacMonthYearScore(Request $request){
        $zodiac_sign_id = $request->zodiac_sign_id;
        $zodiac_year = $request->zodiac_year;

        $zodiac_scores = ZodiacDayRating::where(DB::raw("(DATE_FORMAT(zodiac_date,'%Y'))"), "=", $zodiac_year)
                        ->where('zodiac_sign_id', $zodiac_sign_id)
                        ->select('zodiac_sign_id', DB::raw("(DATE_FORMAT(zodiac_date,'%Y-%m')) as yr_mon"), DB::raw('ROUND(AVG(day_score)) as avg_score'))
                        ->groupBy(DB::raw("(DATE_FORMAT(zodiac_date,'%Y-%m'))"))
                        ->get();

        return view('zodiac_month_analysis_filter', compact('zodiac_scores'));
    }

    public function zodiacYearlyAnalysis(){
        $title = " | Zodiac Yearly Analysis";

        return view('zodiac_year_analysis', compact('title'));
    }

    public function zodiacYearlyAnalysisReport(Request $request){
        $title = " | Zodiac Yearly Analysis";

        $this->validate($request, [
            'zodiac_year' => 'required'
        ]);

        $zodiac_year = $request->zodiac_year;

        $zodiac_scores = ZodiacDayRating::where(DB::raw("(DATE_FORMAT(zodiac_date,'%Y'))"), "=", $zodiac_year)  
                                        ->select('zodiac_sign_id', DB::raw('ROUND(AVG(day_score)) as avg_score'))
                                        ->groupBy('zodiac_sign_id')
                                        ->get();

        return view('zodiac_year_analysis', compact('title', 'zodiac_year', 'zodiac_scores'));
    }
}
