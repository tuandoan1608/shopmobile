@extends('admin.master')
@section('content')

    <div class="content-wrapper">
        <section class="content-header col-md-12" style="margin:10px; display:inline">

            <div class="heder-tab" style=" margin-left:20px;  padding:10px;
                  
                list-style: none;
                background-color: white;
                border-radius: 4px;">
                <ol id="menu" class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i> Home /</a></li>
                    <li><a href="">category / </a></li>
                    <li class="active">add</li>

                </ol>
                <div style="float: right;margin-top:-32px"><a href="{{ route('categoryadd') }}"><button
                            class="btn btn-success">Thêm danh mục</button></a></div>
            </div>



        </section>

        <div class="main-conten">
            <div>


                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form accept-charset="utf-8" action="{{ route('categorystore') }}" method="post">
                            {!! csrf_field() !!}
                            <fieldset>
                                <div class="form-group">
                                    <label for="disabledTextInput">Tên danh mục</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="disabledSelect">Danh mục</label>
                                    <select class="form-control" name="parentID">
                                        <option value="0">Danh mục cha</option>
                                        {!! $data !!}

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status:</label>
                                    <label class="radio-inline">
                                        <input name="status" value="1" checked="" type="radio">Hiện
                                    </label>
                                    <label class="radio-inline">
                                        <input name="status" value="0" type="radio">Ẩn
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </fieldset>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>

    </div>

@endsection
