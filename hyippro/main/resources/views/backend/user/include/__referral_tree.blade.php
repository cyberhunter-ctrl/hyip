<div
    class="tab-pane fade"
    id="pills-tree"
    role="tabpanel"
    aria-labelledby="pills-transactions-tab"
>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h4 class="title">{{ __('Referral Tree') }}</h4>
                </div>
                <div class="site-card-body table-responsive">

                    {{-- level referral tree --}}
                    @if(setting('site_referral','global') == 'level' && $user->referrals->count() > 0)
                        <section class="management-hierarchy">
                            <div class="hv-container">
                                <div class="hv-wrapper">
                                    <!-- tree component -->
                                    @include('frontend.referral.include.__tree',['levelUser' => $user,'level' => $level,'depth' => 1, 'me' => true])
                                </div>
                            </div>
                        </section>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

