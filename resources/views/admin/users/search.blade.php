<form method="get" >
<!-- {{csrf_field()}} -->

    <!-- Submit Field -->


    <div class="form-group col-sm-4">
        {!! Form::label('from', 'من') !!}
        <input type="date" name="from" class="form-control" value="{{ request()->from != '' ? request()->from : ''}}">
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('to', 'الي') !!}
        <input type="date" name="to" class="form-control" value="{{ request()->to != '' ? request()->to : ''}}">
    </div>



    <div class=" col-md-1" style="margin-top: 25px;">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> بحث</button>
    </div>


    <div class=" col-md-1" style="margin-top: 25px;">
        <a href="{{route('admin.branchofficers')}}" class="btn btn-primary"><i class="fa fa-backward"></i> {{trans('global.backSearch')}}</a>
    </div>


    <br><br><br><br>
    <div class="form-group col-sm-2">
        <label for="name" >@lang('branchofficers.name')</label>
        <input type="text" id="name" value="{{ request()->search_name != '' ? request()->search_name : ''}}"  name="search_name" class="form-control" autocomplete="off" placeholder="@lang('branchofficers.name') .." >
    </div>
    <div class="form-group col-sm-2">
        <label for="email" >@lang('branchofficers.email')</label>
        <input type="text" id="email" value="{{ request()->email != '' ? request()->email : ''}}" name="email" class="form-control" autocomplete="off" placeholder="@lang('branchofficers.email') ..">

    </div>
    <div class="form-group col-sm-2">
        <label for="search_branches" >@lang('branchofficers.city')</label>
        <input type="text" id="search_branches" name="search_branches" value="{{ request()->search_branches != '' ? request()->search_branches : ''}}" class="form-control" autocomplete="off" placeholder="@lang('branchofficers.city') ..">
    </div>
    <div class="form-group col-sm-2">
        <label for="mobile" >@lang('branchofficers.mobile')</label>
        <input type="text" id="mobile" name="mobile" value="{{ request()->mobile != '' ? request()->mobile : ''}}" class="form-control" autocomplete="off" placeholder="@lang('branchofficers.mobile') ..">
    </div>

    <div class="form-group col-sm-2">
        <label for="status" >@lang('global.status')</label>
        <select name="status" class="form-control">
            <option value="">اختيار حالة </option>
            <option  value="1" @if(request()->status == 1) selected @endif>مفعل</option>
            <option  value="0" @if(request()->status == '0') selected @endif>غير مفعل</option>

        </select>

    </div>




</form>