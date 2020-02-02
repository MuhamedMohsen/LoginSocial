@extends('admin.index')
@section('page_title')
    {{trans('لوحة التحكم')}}
@endsection
@section('content')
<script src="//cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{trans('لوحة التحكم')}}</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">


            </div>

        </div>
        <!-- /.box-body -->


<script src="{{url('/')}}/js/client.js"></script>



@endsection