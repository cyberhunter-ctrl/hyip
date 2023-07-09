@extends('backend.withdraw.index')
@section('title')
    {{ __('Withdraw Methods') }}
@endsection
@section('withdraw_content')
    <div class="col-xl-12 col-md-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">{{ __('Withdraw Methods') }}</h3>
            </div>
            <div class="site-card-body">
                <p class="paragraph">
                    {{ __(' All the ') }} <strong>{{ __('Withdraw Methods') }}</strong> {{ __('setup for user') }}
                </p>
                @foreach( $withdrawMethods as $method)
                    <div class="single-gateway">
                        <div class="gateway-name">
                            <div class="gateway-icon">
                                <img
                                    src="{{ asset($method->icon) }}"
                                    alt=""
                                />
                            </div>
                            <div class="gateway-title">
                                <h4>{{ $method->name }}</h4>
                                <p>{{ __('Minimum Withdraw: ').$method->min_withdraw .' '.$currency }}</p>
                            </div>
                        </div>
                        <div class="gateway-right">
                            <div class="gateway-status">
                                @if( $method->status)
                                    <div class="site-badge success">{{ __('Activated') }}</div>
                                @else
                                    <div class="site-badge pending">{{ __('DeActivated') }}</div>
                                @endif
                            </div>
                            <div class="gateway-edit">
                                <a href="{{ route('admin.withdraw.account-edit',$method->id) }}"><i
                                        icon-name="settings-2"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
