<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Issue</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        input[type="number"],
        input[type="datetime-local"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button.btn {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .combo {
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 1;
            min-width: 200px;
        }

        button.btn:hover {
            background-color: #45a049;
        }

        .container {
            margin-top: 20px;
        }

        select {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thêm Vấn Đề</h1>
        <form action="{{ route('createIssuePost') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="computer_id">Máy Tính:</label>
                <select name="computer_id" id="computer_id" required>
                    @foreach($computers as $computer)
                        <option value="{{ $computer->id }}">{{ $computer->computer_name }} ({{ $computer->model }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="reported_by">Người Báo Cáo:</label>
                <input type="text" id="reported_by" name="reported_by" value="{{ $issue->reported_by }}">
            </div>

            <div class="form-group">
                <label for="reported_date">Ngày Báo Cáo:</label>
                <input type="datetime-local" id="reported_date" name="reported_date" value="{{ $issue->reported_date }}" required>
            </div>

            <div class="form-group">
                <label for="description">Mô Tả Vấn Đề:</label>
                <textarea id="description" name="description" rows="4" required>{{ $issue->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="urgency">Mức độđộ</label>
                <select id="urgency" name="urgency" class="form-control" required>
                    <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                    <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                    <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                    <option value="Closed" {{ $issue->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Lưu Vấn Đề</button>
        </form>
    </div>
</body>

</html>
