@inject('request', 'Illuminate\Http\Request')
@extends('admin.index')


@section('content')

    <h3 class="page-title">@lang('users.show')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="box-header">

                <div class="col-md-3">
                    <a href="{{ route('users.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> @lang('users.create')</a>
                </div>


                <div class="col-md-12">


                </div>

            </div>
        </div>

        <div class="box-body table-responsive table-bordered">
            <table class="table table-hover table-bordered" style="border: 1px solid #f0f0f0;">
                <thead>
                    <tr>

                        <th>@lang('users.ids')</th>
                        <th>@lang('users.name')</th>
                        <th>@lang('users.email')</th>
                        <th>@lang('users.link')</th>
                        <th>@lang('users.stutes')</th>
                        <th style="text-align: center">@lang('global.action')</th>
                    </tr>
                </thead>


                    <tbody id="users-crud">
                    @if (count($users) > 0)
                        @foreach ($users as $item)
                            <tr id="user_id_{{ $item->id }}">

                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->link }}</td>

                                <td>
                                    @if($item->status == 1)
                                        <span class="label label-success">@lang('global.enabled')</span>
                                    @else
                                        <span class="label label-danger">@lang('global.notenabled')</span>

                                    @endif
                                </td>


                                <td style="text-align: center">

                                    <a href="{{ route('users.edit',[$item->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" id="delete-user" data-id="{{ $item->id }}" class="btn btn-danger delete-user">Delete</a></td>

                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">@lang('global.app_no_entries_in_table')</td>
                        </tr>

                    @endif
                 </tbody>

            </table>
            <br>
            @if($users->count()>0)
                <div class="col-md-5">{{trans('global.total')}} : {{$users->total()}} </div>
                <div class="pagination pagination-sm no-margin pull-right">
                    <div class=""> {{ $users->appends(\Request::except('_token'))->render() }}</div>
                </div>
            @endif
        </div>
    </div>

@include('admin.users.script')
    <!-- /.box -->
@stop

