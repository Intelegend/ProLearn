@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.mail.title')</h3>
    {{ Form::open(['route' => 'send', 'method' => 'GET'])}}
    <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('to', 'Ваше имя', ['class' => 'control-label']) !!}  
                    {!! Form::text('to', old('to'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('slug'))
                        <p class="help-block">
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                
                    {!! Form::label('fromlb', 'Кому', ['class' => 'control-label']) !!}  
                    {!! Form::text('from', old('from'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('slug'))
                        <p class="help-block">
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">

                    {!! Form::label('subjectlb', 'Тема письма', ['class' => 'control-label']) !!}  
                    {!! Form::text('subject', old('subject'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('slug'))
                        <p class="help-block">
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('full_textlb', 'Текст письма', ['class' => 'control-label']) !!}
                    {!! Form::textarea('fulltext', old('fulltext'), ['class' => 'form-control editor', 'placeholder' => '' ]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('slug'))
                        <p class="help-block">
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>
            </div>
    {!! Form::submit(trans('global.app_send'), ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@stop