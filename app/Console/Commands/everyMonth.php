<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Rcsmaster;
use App\Models\AdRcstotal;
use Illuminate\Support\Facades\DB;

class everyMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'month:rcs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'monthly procedure';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $month = date('M');
        $date = date('Y-m-d');
        $member = DB::table('members')
                        ->select('members.*')
                        ->where('norcs','=','0')
                        ->get();
        foreach ($member as $key => $value) {
            $rcs_master = new Rcsmaster();
            $rcs_master->member_id = $value->member_id;
            $rcs_master->rcs_date = $date;
            $rcs_master->rcs_month = $month;
            $rcs_master->rcs_tobepaid = $value->rcs;
            $rcs_master->save();
        }
        
     $rcs_masterinfo = DB::table('rcsmasters')
    ->select('member_id',DB::raw('sum(rcs_tobepaid) as total_rcs'))
    ->groupby('member_id')
    ->get();
    $count_class = count($rcs_masterinfo);
                            
    for( $i=0; $i <$count_class; $i++){
        $total_adrcs = AdRcstotal::where('member_id',$rcs_masterinfo[$i]->member_id)->first();
        $total_adrcs->total_rcs=$rcs_masterinfo[$i]->total_rcs;
        $total_adrcs->total_paidrcs = $total_adrcs->cash_rcs+$total_adrcs->cheque_rcs;
        $total_adrcs->total_duercs = $rcs_masterinfo[$i]->total_rcs-$total_adrcs->total_paidrcs;
        $total_adrcs->update();
    }         
    }
}
