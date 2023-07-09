<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\TxnType;
use App\Http\Controllers\Controller;
use App\Models\LevelReferral;
use App\Models\Transaction;
use App\Models\User;

class ReferralController extends Controller
{
    public function referral()
    {
        if (!setting('sign_up_referral', 'permission')) {
            // notify()->error('Referral Disabled From Admin', 'Error');
            // return redirect()->back();
            abort('404');
        }
        $user = auth()->user();


        if (setting('site_referral','global') == 'level'){
            $referrals = Transaction::where('user_id', $user->id)->where('target_type', '!=', null)->where('is_level','=', 1)->get()->groupBy('level');
        }else{
            $referrals = Transaction::where('user_id', $user->id)->where('target_type', '!=', null)->get()->groupBy('target');
        }


        $generalReferrals = Transaction::where('user_id', $user->id)->where('target_type', null)->where('type', TxnType::Referral)->latest()->paginate(8);


        $getReferral = $user->getReferrals()->first();
        $totalReferralProfit = $user->totalReferralProfit();

        $level = LevelReferral::max('the_order');

        return view('frontend.referral.index', compact('referrals', 'getReferral', 'totalReferralProfit', 'generalReferrals','level'));
    }
}
