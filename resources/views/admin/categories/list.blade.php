@extends('admin.master')

@section('content')
  
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('flash::message')
        </div>
            <section class="content-header col-md-12" style="margin:10px; display:inline" >
           
                <div class="heder-tab" style=" margin-left:20px;  padding:10px;
                  
                list-style: none;
                background-color: white;
                border-radius: 4px;">
                    <ol id="menu" class="breadcrumb" >
                        <li><a href=""><i class="fa fa-dashboard"></i> Home /</a></li>
                        <li><a href="">category / </a></li>
                        <li class="active">List</li>
                        
                    </ol>
                    <div style="float: right;margin-top:-32px"><a href="{{route('categoryadd')}}"><button class="btn btn-success">Thêm danh mục</button></a></div>
                </div>
                   
                  
                  
            </section>
           

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                       
                        <div class="card">
                            
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>Thuộc danh mục</th>
                                                <th>Trạng thái</th>
                                                <th>Sửa</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $data as $item )
                                            
                                       
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{$item->parentID}}
                                            </td>
                                            <td>{{ $item->status }}</td>
                                            <td width="3%" class="center"><a href="{{route('categoryshow',['id'=>$item->id])}}"><i class="fa fa-pencil fa-fw" style="color:blue" ></i> s</a></td>
                                            <td width="3%" class="center"> <a class="delete" data-url="{{route('categorydelete',['id'=>$item->id])}}"><i style="color:red" class="fa fa-minus-circle fa-fw"  ></i></a></td>
                                        </tr>
                                        @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "pageLength": 25,
                "lengthChange": false,
                "autoWidth": false,
                "language": {
                    "search": "Tìm kiếm:",
                    "info": "Hiển thị _START_ từ _END_ của _TOTAL_ bản ghi",
                    "infoEmpty": "Chưa có dữ liệu",
                    "loadingRecords": "Vui lòng đợi - loading...",
                    "processing": "Đang xử lý...",
                "paginate": {
                   
                    "next": "Tiếp",
                    "previous": "Lùi",
                    "first": "Đầu",
                    "last": "Cuối",
                   

                }
            },
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
        $('div.alert').delay(3000).slideUp();
        $(function() {
            $('.delete').on('click', function(e) {
                e.preventDefault();
                let urlreq = $(this).data('url');
                let that = $(this);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'GET',
                            url: urlreq,
                            success: function(data) {
                                if (data.code == 200) {
                                    that.parent().parent().remove();
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                }
                            }
                        })

                    }
                })
            })
        })
    
 
    </script>
@endsection
