@extends('layout.master')

@section('title')
    @parent
    :: Account Settings
@stop

@section('customcssfiles')
    {!! HTML::style('css/bootstrap-social.css') !!}
@stop

@section('customcss')
    .btn-github {
        padding:10px 15px 10px 61px;
    }
    .password-change {
        padding: 10px 20px;
        background: #18bc9c;
        margin-bottom: 15px;
        color: #fff;
        border: 3px solid #161f29;
        border-radius: 8px;
    }
@stop

@section('customjsfiles')

@stop

@section('customjs')

@stop

@section('content')
<div class="row">

    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" style="margin-bottom:20px;">
        <a href="{{ route('social.github') }}" class="btn btn-block btn-social btn-lg btn-github"><i class="fa fa-github"></i>{{ (auth()->user()->usingGithub()) ? 'Update GitHub' : 'Connect with GitHub' }}</a>
    </div>

    <div class="col-xs-12 col-sm-6 col-sm-offset-3">

        <div class="alert alert-info">
            Your profile picture is generated by <a href="https://gravatar.com" class="alert-link">Gravatar</a> with your account email.<br>
            To modify it you must do so on their site.
        </div>

        <div class="well">
            {!! Form::open(['route' => 'settings', 'class' => 'form-horizontal']) !!}
            <fieldset>

                <legend>Account Settings</legend>

                <div class="form-group @if ($errors->has('name')) has-error @endif">
                    <div class="col-md-12">
                        <label class="control-label">Name</label>
                        {!! Form::text('name', auth()->user()->name, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => '']) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group @if ($errors->has('username')) has-error @endif">
                    <div class="col-md-12">
                        <label class="control-label">Username</label>
                        {!! Form::text('username', auth()->user()->username, ['class' => 'form-control', 'placeholder' => 'Username', 'required' => '']) !!}
                        @if ($errors->has('username'))
                            <span class="help-block">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group @if ($errors->has('email')) has-error @endif">
                    <div class="col-md-12">
                        <label class="control-label">Email</label>
                        {!! Form::text('email', auth()->user()->email, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => '']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group @if ($errors->has('website')) has-error @endif">
                    <div class="col-md-12">
                        <label class="control-label">Website</label><small> (not required)</small>
                        {!! Form::text('website', settings('website'), ['class' => 'form-control', 'placeholder' => 'Website']) !!}
                        @if ($errors->has('website'))
                            <span class="help-block">{{ $errors->first('website') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group @if ($errors->has('github_username')) has-error @endif">
                    <div class="col-md-12">
                        <label class="control-label">GitHub Username</label><small> (not required) So we can link to your profile!</small>
                        {!! Form::text('github_username', settings('github_username'), ['class' => 'form-control', 'placeholder' => 'GitHub Username']) !!}
                        @if ($errors->has('github_username'))
                            <span class="help-block">{{ $errors->first('github_username') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group @if ($errors->has('twitter_username')) has-error @endif">
                    <div class="col-md-12">
                        <label class="control-label">Twitter Username</label><small> (not required) So we can link to your profile!</small>
                        {!! Form::text('twitter_username', settings('twitter_username'), ['class' => 'form-control', 'placeholder' => 'Twitter Username']) !!}
                        @if ($errors->has('twitter_username'))
                            <span class="help-block">{{ $errors->first('twitter_username') }}</span>
                        @endif
                    </div>
                </div>

                <div class="password-change">
                    <p><h6><strong>Only required if changing.</strong></h6></p>

                    @if(auth()->user()->getAuthPassword())
                        <div class="form-group @if ($errors->has('current_password')) has-error @endif">
                            <div class="col-md-12">
                                <label class="control-label">Current Password</label>
                                {!! Form::password('current_password', ['class' => 'form-control input-sm', 'placeholder' => 'Current Password']) !!}
                                @if ($errors->has('current_password'))
                                    <span class="help-block">{{ $errors->first('current_password') }}</span>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="form-group @if ($errors->has('new_password')) has-error @endif">
                        <div class="col-md-12">
                            <label class="control-label">New Password</label>
                            {!! Form::password('new_password', ['class' => 'form-control input-sm', 'placeholder' => 'New Password']) !!}
                            @if ($errors->has('new_password'))
                                <span class="help-block">{{ $errors->first('new_password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if ($errors->has('new_password')) has-error @endif">
                        <div class="col-md-12">
                            <label class="control-label">New Password Confirmation</label>
                            {!! Form::password('new_password_confirmation', ['class' => 'form-control input-sm', 'placeholder' => 'New Password Confirmation']) !!}
                            @if ($errors->has('new_password_confirmation'))
                                <span class="help-block">{{ $errors->first('new_password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-sm btn-primary">Update</button>

            </fieldset>
            {!! Form::close() !!}
        </div>

    </div>

        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" style="margin-bottom:20px;">
            <a href="{{ route('delete') }}" class="btn btn-block btn-danger">Delete Account</a>
            <small><i>Confirmation required</i></small>
        </div>

</div>
@stop