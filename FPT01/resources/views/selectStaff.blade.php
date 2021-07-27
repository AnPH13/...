<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Hỗ trợ</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>
<body>
    <table>
        <th>
            <td>{{ $info->Username }}</td>
            <td>{{ $info->Infomation }}</td>
        </th>
    </table>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Nhân viên</th>
                <th>Email</th>
                <th>Chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staff as $a)
            <form action="{{ url('/hotro/nhanvien') }}" method="post">
            <tr>
                <td id="id" name="id">{{ $a->id }}</td>
                <td id="nameStaff" name="nameStaff">{{ $a->name }}</td>
                <td id="email" name="email">{{ $a->email }}</td>
                <td><button type="submit">chọn nhân viên</button></td>
            </tr>
            </form>
            @endforeach
        </tbody>
    </table>
</body>
</html>