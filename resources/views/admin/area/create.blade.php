@extends('admin.index')
@section('content')
    @push('js')
        <script type="text/javascript" src='//maps.google.com/maps/api/js?sensor=false&libraries=places&key=
AIzaSyC_GpU_jFT8zLahYp7FNKD0bzcGVnNMZ7k'></script>
        <script src="{{url('/')}}/js/locationpicker.jquery.js"></script>
        <script>
            $('#us1').locationpicker({
                location: {
                    latitude: 24.774265,
                    longitude: 46.738586
                },
                radius: 300,
                markerIcon: '{{url('images/map-marker-2-xl.png')}}',
                inputBinding: {
                    latitudeInput: $('#lat'),
                    longitudeInput: $('#lon'),
                    locationNameInput: $('#address-address')
                }

            });
        </script>

    @endpush

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">انشاء حي</h3>
        </div>
        <!-- /.box-header -->
        <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
                <form class="form-horizontal" method="POST" action="{{aurl('city-area/area/')}}"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box-body">

                        <div class="form-group">
                            <label for="value" class="col-sm-1 control-label">اسم حي</label>
                            <div class="col-sm-10">
                                <input type="text" name="name"  class="form-control" id="value" placeholder="اسم الفرع">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-sm-1 control-label">المدن</label>
                            <div class="col-sm-5">
                                <select name="caltegors" id="caltegors" required>
                                    <option value="">المدن</option>
                                    @foreach($caltegor as $caltegors)
                                        <option value="{{$caltegors->id}}">{{$caltegors->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="value" class="col-sm-1 control-label">عنوان الحي</label>
                            <div class="col-sm-10">
                                <input type="text" name="address"  class="form-control" id="address-address" placeholder="عنوان الحي">
                                <input type="hidden" name="lon"  class="form-control" id="lon" >
                                <input type="hidden" name="lat"  class="form-control" id="lat" >

                            </div>

                        </div>

                        <div class="form-group">
                            <label for="value" class="col-sm-1 control-label"></label>

                            <div class="col-sm-10">
                                <div id="us1" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer ">
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary pull-right">حفظ</button>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn default" type="reset">اعاده تعين</button>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection