@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.mark.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.mark.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('course_id', 'Курс', ['class' => 'control-label']) !!}
                    {!! Form::select('course_id', $courses, old('course_id'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('course_id'))
                        <p class="help-block">
                            {{ $errors->first('course_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lessons_id', 'Урок', ['class' => 'control-label']) !!}
                    {!! Form::select('lessons_id', $lessons, old('lessons_id'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lessons_id'))
                        <p class="help-block">
                            {{ $errors->first('lessons_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tests', 'Тест', ['class' => 'control-label']) !!}
                    {!! Form::select('test_id', $tests, old('test_id'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tests'))
                        <p class="help-block">
                            {{ $errors->first('tests') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('student', 'Студент', ['class' => 'control-label']) !!}
                    {!! Form::select('student_id', $student, old('student_id'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('student'))
                        <p class="help-block">
                            {{ $errors->first('student') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('test_result', 'Баллы за тест', ['class' => 'control-label']) !!}
                    {!! Form::select('tests_result', $tests_result, old('tests_result'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('test_result'))
                        <p class="help-block">
                            {{ $errors->first('test_result') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mark', 'Оценка', ['class' => 'control-label']) !!}
                    {!! Form::select('mark', $mark, old('mark'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mark'))
                        <p class="help-block">
                            {{ $errors->first('mark') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
    </script>

@stop