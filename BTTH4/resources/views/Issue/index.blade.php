<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-10">
                            <h2>Manage <b>Isues</b></h2>
                        </div>
                        <div class="col-sm-2">
                            <a href="/issue/create" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                                <span>Add
                                    New Isues</span></a>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if(session('fail'))
                <div class="alert alert-fail">
                    {{ session('fail') }}
                </div>
                @endif
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã vấn đề</th>
                            <th>Tên máy tính</th>
                            <th>Tên phiên bản</th>
                            <th>Người báo cáo sự cố</th>
                            <th>Thời gian báo cáo</th>
                            <th>Mức độ sự cố</th>
                            <th>Trạng thái hiện tại</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($issues as $issue)
                        <tr>
                            <td>{{ $issue->id }}</td>
                            <td>{{ $issue->computer->computer_name }}</td>
                            <td>{{ $issue->computer->model }}</td>
                            <td>{{ $issue->reported_by }}</td>
                            <td>{{ $issue->reported_date }}</td>
                            <td>{{ $issue->urgency }}</td>
                            <td>{{ $issue->status }}</td>
                            <td>
                                <a href="{{ route('editIssue', $issue->id) }}" class="edit"><i
                                        class="material-icons">&#xE254;</i></a>
                                <a class="delete btn-delete" data-id={{ $issue->id }}>
                                    <i class="material-icons">&#xE872;</i>
                                </a>
                                <!-- Nút Xóa -->
                                <form action="{{ route('deleteIssue', $issue->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                </form>


                                <!-- end Form xoa -->


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{ $issues->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/issue.js') }}"></script>
</body>

</html>