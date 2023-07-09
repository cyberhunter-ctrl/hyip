<?php

namespace App\Http\Controllers\Backend;

use App\Enums\ReferralType;
use App\Http\Controllers\Controller;
use App\Models\LevelReferral;
use App\Models\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;

class LevelReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        $referralType = [
            ReferralType::Deposit,
            ReferralType::Investment,
            ReferralType::Profit,
        ];


        $levelReferral = new LevelReferral();
        $deposits = $levelReferral->where('type',ReferralType::Deposit->value)->get();
        $investments = $levelReferral->where('type',ReferralType::Investment->value)->get();
        $profits = $levelReferral->where('type',ReferralType::Profit->value)->get();

        return view('backend.referral.level.index', compact('referralType', 'investments', 'deposits','profits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'level_type' => new Enum(ReferralType::class),
            'bounty' => 'required',
        ]);


        if ($validator->fails()) {
            notify()->error($validator->errors()->first(), 'Error');
            return redirect()->back();
        }

        $input = $request->all();


        $data = [
            'type' => $input['level_type'],
            'bounty' => $input['bounty'],
        ];

        $position = LevelReferral::where('type',$input['level_type'])->max('the_order');
        $data = array_merge($data, ['the_order' => $position + 1]);


        LevelReferral::create($data);
        notify()->success('Referral Level created successfully');
        return redirect()->route('admin.referral.level.index');


    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\LevelReferral  $levelReferral
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'bounty' => 'required',
        ]);

        if ($validator->fails()) {
            notify()->error($validator->errors()->first(), 'Error');
            return redirect()->back();
        }

        $input = $request->all();

        $data = [
            'bounty' => $input['bounty'],
        ];

        LevelReferral::find($id)->update($data);
        notify()->success('Referral Level Updated successfully');
        return redirect()->route('admin.referral.level.index');
    }

    public function statusUpdate(Request $request)
    {

        $key = $request->type;
        $value = setting($key) ? 0 : 1;

        Setting::add($key, $value, 'boolean');

        notify()->success(ucwords(str_replace('_',' ' ,$key)).'  Status Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LevelReferral  $levelReferral
     * @return RedirectResponse
     */
    public function destroy(Request $request ,$id)
    {
        $levelReferral = LevelReferral::find($id);
        $levelReferral->delete();


        $reorders = LevelReferral::where('type',$request->type)->get();
        $i = 1;
        foreach ($reorders as $reorder) {
            $reorder->the_order = $i;
            $reorder->save();
            $i++;
        }

        notify()->success('Referral Level Delete successfully');
        return redirect()->route('admin.referral.level.index');

    }


}
