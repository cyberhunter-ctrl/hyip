@extends('backend.layouts.app')
@section('title')
    {{ __('Hero Section') }}
@endsection
@section('content')
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="title-content">
                            <h2 class="title">{{ __('Hero Section') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="site-card">
                        <div class="site-card-header">
                            <h3 class="title">{{ __('Contents') }}</h3>
                        </div>
                        <div class="site-card-body">
                            <form action="{{ route('admin.page.section.section.update') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="section_code" value="hero">
                                <div class="site-input-groups row">
                                    <label for="" class="col-sm-3 col-label pt-0">{{ __('Section Activity') }}<i
                                            icon-name="info" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="Manage Section Visibility"></i></label>
                                    <div class="col-sm-3">
                                        <div class="site-input-groups">
                                            <div class="switch-field">
                                                <input type="radio" id="active" name="status" @if($status) checked
                                                       @endif value="1"/>
                                                <label for="active">{{ __('Show') }}</label>
                                                <input type="radio" id="deactivate" name="status" @if(!$status) checked
                                                       @endif value="0"/>
                                                <label for="deactivate">{{ __('Hide') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="site-input-groups row">
                                    <label for="" class="col-sm-3 col-label">{{ __('Hero Title') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="hero_title" class="box-input"
                                               value="{{ $data->hero_title }}">
                                    </div>
                                </div>
                                <div class="site-input-groups row">
                                    <label for="" class="col-sm-3 col-label">{{ __('Hero Content') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="hero_content" class="box-input"
                                               value="{{ $data->hero_content }}">
                                    </div>
                                </div>
                                <div class="site-input-groups row">
                                    <label for="" class="col-sm-3 col-label">{{ __('Hero Button 1') }}<i
                                            icon-name="info" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="Leave it blank if you don't need this button"></i></label>
                                    <div class="col-sm-9">
                                        <div class="form-row">
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="site-input-groups">
                                                    <label for="" class="box-input-label">{{ __('Button Icon') }} <a
                                                            class="link" href="https://fontawesome.com/icons"
                                                            target="_blank">{{ __('Fontawesome') }}</a></label>
                                                    <input type="text" name="hero_button1_icon" class="box-input"
                                                           value="{{ $data->hero_button1_icon }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="site-input-groups">
                                                    <label for=""
                                                           class="box-input-label">{{ __('Button Label') }}</label>
                                                    <input type="text" name="hero_button1_level" class="box-input"
                                                           value="{{ $data->hero_button1_level }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="site-input-groups">
                                                    <label for="" class="box-input-label">{{ __('Bottom URL') }}</label>
                                                    <div class="site-input-groups">
                                                        <div class="site-input-groups">
                                                            <input type="text" name="hero_button1_url" class="box-input"
                                                                   value="{{ $data->hero_button1_url }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="site-input-groups">
                                                    <label for="" class="box-input-label">{{ __('Target') }}</label>
                                                    <div class="site-input-groups">
                                                        <select name="hero_button1_target" class="form-select">
                                                            <option @if($data->hero_button1_target == '_self') selected
                                                                    @endif value="_self">{{ __('Same Tab') }}</option>
                                                            <option @if($data->hero_button1_target == '_blank') selected
                                                                    @endif value="_blank">{{ __('Open In New Tab') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="site-input-groups row">
                                    <label for="" class="col-sm-3 col-label">{{ __('Hero Button 2') }}<i
                                            icon-name="info" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="Leave it blank if you don't need this button"></i></label>
                                    <div class="col-sm-9">
                                        <div class="form-row">
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="site-input-groups">
                                                    <label for="" class="box-input-label">{{ __('Button Icon') }} <a
                                                            class="link" href="https://fontawesome.com/icons"
                                                            target="_blank">Fontawesome</a></label>
                                                    <input type="text" name="hero_button2_icon" class="box-input"
                                                           value="{{ $data->hero_button2_icon }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="site-input-groups">
                                                    <label for=""
                                                           class="box-input-label">{{ __('Button Label') }}</label>
                                                    <input type="text" name="hero_button2_lavel" class="box-input"
                                                           value="{{ $data->hero_button2_lavel }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="site-input-groups">
                                                    <label for="" class="box-input-label">{{ __('Bottom URL') }}</label>
                                                    <div class="site-input-groups">
                                                        <input type="text" name="hero_button2_url" class="box-input"
                                                               value="{{ $data->hero_button2_url }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="site-input-groups">
                                                    <label for="" class="box-input-label">{{ __('Target') }}</label>
                                                    <div class="site-input-groups">
                                                        <select name="hero_button2_target" class="form-select" id="">
                                                            <option
                                                                @selected($data->hero_button2_target == '_self')  value="_self">{{ __('Same Tab') }}</option>
                                                            <option
                                                                @selected($data->hero_button2_target == '_blank') value="_blank">{{ __('Open In New Tab') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="site-input-groups row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-label">
                                        {{ __('Hero Right Image') }}
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                                        <div class="wrap-custom-file">
                                            <input type="file" name="hero_right_img" id="heroRightImg"
                                                   accept=".gif, .jpg, .png"/>
                                            <label for="heroRightImg" class="file-ok"
                                                   style="background-image: url({{ asset($data->hero_right_img) }})">
                                                <img class="upload-icon"
                                                     src="{{ asset('global/materials/upload.svg') }}" alt=""/>
                                                <span>{{ __('Update Image') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="site-input-groups row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-label">
                                        {{ __('Hero Right Top Image') }}
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                                        <div class="wrap-custom-file">
                                            <input type="file" name="hero_right_top_img" id="heroRightTopImg"
                                                   accept=".gif, .jpg, .png"/>
                                            <label for="heroRightTopImg" class="file-ok"
                                                   style="background-image: url({{ asset($data->hero_right_top_img) }})">
                                                <img class="upload-icon"
                                                     src="{{ asset('global/materials/upload.svg') }}" alt=""/>
                                                <span>{{ __('Update Image') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit"
                                                class="site-btn-sm primary-btn w-100">{{ __('Save Changes') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
