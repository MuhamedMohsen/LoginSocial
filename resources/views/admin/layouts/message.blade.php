@if(session()->has('success'))

    <div class="alert alert-success alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h3><i class="fa fa-check"></i> {{ session('success') }}</h3>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        <h4><i class="icon fa fa-ban"></i> خطأ</h4>
        <h4>{{ session('error') }}</h4>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif