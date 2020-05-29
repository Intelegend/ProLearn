@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.mark.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.mark.fields.course')</th>
                            <td>{{ $mark->course->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.mark.fields.lesson')</th>
                            <td>{{ $mark->lessons->title}}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.mark.fields.test')</th>
                            <td>{{ $mark->test->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.mark.fields.student')</th>
                            <td>{{ $mark->students->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.mark.fields.test_result')</th>
                            <td>{!! $mark->testresult->test_result !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.mark.fields.mark')</th>
                            <td>{!! $mark->mark !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
@stop