<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Visit;
use App\Models\Technician;
use App\Models\User;
use App\Charts\CommonChart;
use Yajra\DataTables\DataTables;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function getCurrentFinancialYear()
    {
        $start_month = 1;
        $end_month = $start_month - 1;
        if ($start_month == 1) {
            $end_month = 12;
        }

        $start_year = date('Y');
        //if current month is less than start month change start year to last year
        if (date('n') < $start_month) {
            $start_year = $start_year - 1;
        }

        $end_year = date('Y');
        //if current month is greater than end month change end year to next year
        if (date('n') > $end_month) {
            $end_year = $start_year + 1;
        }
        $start_date = $start_year.'-'.str_pad($start_month, 2, 0, STR_PAD_LEFT).'-01';
        $end_date = $end_year.'-'.str_pad($end_month, 2, 0, STR_PAD_LEFT).'-01';
        $end_date = date('Y-m-t', strtotime($end_date));

        $output = [
            'start' => $start_date,
            'end' => $end_date,
        ];

        return $output;
    }

    public function getSellsCurrentFy($start, $end)
    {
        // $start = Carbon::parse($start)->timestamp;
        // $end = Carbon::parse($end)->timestamp;
        $query = Transaction::leftjoin('orders','transactions.order_id','=','orders.id')
                            ->where('transactions.payment_result','success')->whereBetween('transactions.created_at', [$start, $end]);

        $query->select(
            DB::raw("DATE_FORMAT(transactions.created_at, '%m-%Y') as yearmonth"),
            DB::raw('SUM( orders.total - COALESCE(orders.total, 0)) as total_sells'),
            DB::raw("DATE_FORMAT(transactions.created_at, '%Y-%m-%d') as date"),
        )->groupBy(DB::raw('date(transactions.created_at)'));

        $sells = $query->get();
        return $sells;
    }
    protected function index(){
        $customers = User::count();
        $client_orders = Order::count();
        $technicians = Technician::count();
        $tech_visits = Visit::count();

        $now=Carbon::now('Asia/Riyadh')->toDateString();

        $client_orders_today = Order::whereDate('created_at','=',$now)->count();
        $tech_visits_today = Visit::whereDate('created_at','=',$now)->count();
        $fy = $this->getCurrentFinancialYear();
        $least_7_days = Carbon::parse($fy['start'])->timezone('Asia/Riyadh')->subDays(7)->format('Y-m-d');
     

        // $all_sell_values = Transaction::select(\DB::raw("COUNT(*) as count"))

        // ->whereBetween('transactions.created_at', [ $least_7_days, $fy['end']])

        // ->groupBy(DB::raw('date(transactions.created_at)'))

        // ->pluck('count');


        $today = Carbon::now('Asia/Riyadh');
        $sevenDaysAgo = Carbon::now('Asia/Riyadh')->subDays(8);

        $all_sell_values = Order::select(\DB::raw("COUNT(*) as count"))
                ->whereBetween('created_at', [$sevenDaysAgo, $today])
                ->groupBy(\DB::raw('date(created_at)'))
                ->pluck('count');

        //Chart for sells last 7 days
        $labels = [];
    
        $dates = [];
        for ($i = $all_sell_values->count()-1; $i >= 0; $i--) {
             $date = Carbon::now('Asia/Riyadh')->subDays($i)->format('Y-m-d');
             $dates[] = $date;
 
             $labels[] = date('j M Y', strtotime($date));
 
        }

        $sells_chart_1 = new CommonChart;
    
        $sells_chart_1->labels($labels)->options($this->__chartOptions(
            __(
                __('dash.orders'),
                ['currency' => 'SAR']
            )));
        $sells_chart_1->dataset(__('dash.orders'), 'line', $all_sell_values);


        $today = Carbon::now('Asia/Riyadh');
        $monthAgo = Carbon::now('Asia/Riyadh')->subDays(31);

        $all_sell_values2 = Order::select(\DB::raw("COUNT(*) as count"))
                ->whereBetween('created_at', [$monthAgo, $today])
                ->groupBy(\DB::raw('date(created_at)'))
                ->pluck('count');

        //Chart for sells last 7 days
        $labels2 = [];
 
        $dates2 = [];
        for ($i = $all_sell_values2->count()-1; $i >= 0; $i--) {
             $date2 = Carbon::now('Asia/Riyadh')->subDays($i)->format('Y-m-d');
             $dates2[] = $date2;
 
             $labels2[] = date('j M Y', strtotime($date2));
 
        }

        $sells_chart_2 = new CommonChart;
    
        $sells_chart_2->labels($labels2)->options($this->__chartOptions(
            __(
                __('dash.orders'),
                ['currency' => 'SAR']
            )));
        $sells_chart_2->dataset(__('dash.orders'), 'line', $all_sell_values2);
        $canceled_orders = Booking::where('booking_status_id',2)->count();
        $canceled_orders_today = Booking::where([['created_at','=',$now],['booking_status_id',2]])->count();
        return view('dashboard.home',compact('canceled_orders','canceled_orders_today','tech_visits_today','client_orders_today','sells_chart_1','sells_chart_2','customers','client_orders','technicians','tech_visits'));
    }
    private function __chartOptions($title)
    {
        return [
            'yAxis' => [
                'title' => [
                    'text' => $title,
                ],
            ],
            'legend' => [
                'align' => 'right',
                'verticalAlign' => 'top',
                'floating' => true,
                'layout' => 'vertical',
                'padding' => 20,
            ],
        ];
    }




}
