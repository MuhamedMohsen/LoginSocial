@extends('admin.index')
@section('content')
    @push('js')
        <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=
AIzaSyC_GpU_jFT8zLahYp7FNKD0bzcGVnNMZ7k'></script>
        <script src="{{url('/')}}/js/locationpicker.jquery.js"></script>
        <script>
            $('#us1').locationpicker({
                location: {
                    latitude: "{{$items->lat}}",
                    longitude: "{{$items->lon}}"
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
            <h3 class="box-title">الحي</h3>
        </div>
        <!-- /.box-header --> 
        <div class="box-body">
                <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

            <form class="form-horizontal" method="POST" action="{{aurl('city-area/area')}}/{{$items->id}}"  enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PUT">
                {!! csrf_field() !!}
                <div class="box-body">

                    <div class="form-group">
                        <label for="value" class="col-sm-1 control-label">اسم الحي</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$items->name}}" class="form-control" id="value" placeholder="اسم الحي">
                        </div>
                    </div>
                          <div class="form-group">
                            <label for="quantity" class="col-sm-1 control-label">المدينة</label>
                            <div class="col-sm-5">
                                <select name="caltegors" id="caltegors" required>
                                    <option value="">المدينة</option>
                                    @foreach($caltegor as $caltegors)
                                        <option value="{{$caltegors->id}}"@if($caltegors->id == $items->city_id) selected @endif>{{$caltegors->name}}</option>
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
           

                </div><!-- /.box-body -->
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
    <!-- /.box -->



@endsection