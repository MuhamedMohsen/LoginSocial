@extends('admin.index')
@section('page_title')
    الحي@endsection
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">الحي</h3>
        </div>
        <div class="box-header">
            <div class="col-md-2">
                <a href="{{aurl('city-area/area/create')}}" class="btn btn-primary"> <i class="fa fa-plus"></i> اضافه الحي </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table  id=""  class="table table-bordered table-striped ">

                <thead>
                <tr>

                    <th>اسم الحي</th>
                    <th>موقع الحي</th>
                    <th>المدينه</th>
                    <th>تعديل</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>

                @if($items->count()>0)
                    @foreach($items as $key=>$item)

                        <tr>
                            <td>{{$item->name}}</td>
                            <td>
                                <p  class="pull-right center">
                                    <a href="https://www.google.com.eg/maps/dir/{{$item->lat}},{{$item->lon}}" target="_blank" class='btn btn-danger'>الموقع</a>
                                </p>
                            </td>
                            <td>{{$item->city->name }}</td>

                            <td><a href="{{aurl('city-area/area/'.$item->id.'/edit')}}" class="btn btn-info"> <i class="fa fa-edit"></i> </a></td>
                            <td><a href="{{aurl('city-area/area/'.$item->id.'/destory')}}" class="btn btn-danger"> <i class="fa fa-trash"></i> </a></td>




                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="center" colspan="9" style="text-align: center">
                            {{trans('الجدول خالي')}}
                        </td>
                    </tr>
                @endif

                </tbody>


            </table>
            <br>
            @if($items->count()>0)
                <div class="row">
                    <div class="col-md-5 col-sm-3 "> جميع الحي {{$items->total()}} </div>
                    <div class="col-md-7 col-sm-7">{{$items->links()}}</div>
                </div>
            @endif
        </div>
        <!-- /.box-body -->

    </div>
    <!-- /.box -->


    <!-- Trigger the modal with a button -->

    <!-- Modal -->




@endsection