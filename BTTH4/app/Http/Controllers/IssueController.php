<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Computer;

class IssueController extends Controller
{
  //Trang chu
  public function index()
  {

    $issues = Issue::with('computer')
    ->orderBy('id', 'desc') // Order by 'id' in descending order
    ->paginate(10);
    return view('issue.index', [
      'issues' => $issues,
    ]);
  }

  //Tạo isue
  public function createIssue(){
    //computercomputer
    $computers = Computer::all();

    return view('Issue.create', [
      'computers' => $computers,
    ]);
  }

  public function createIssuePost(Request $req)
  {
    // validate
    $validatedData = $req->validate([
      'computer_id' => 'required|exists:computers,id',  // Kiểm tra xem máy tính có tồn tại trong bảng computers không
      'reported_by' => 'required|string|max:50',  // Báo cáo bởi, tối đa 50 ký tự
      'reported_date' => 'required|date',  // Ngày báo cáo, phải là ngày hợp lệ
      'description' => 'required|string',  // Mô tả sự cố
      'urgency' => 'required|in:Low,Medium,High',  // Mức độ khẩn cấp, chọn trong các giá trị cho trước
      'status' => 'required|in:Open,In Progress,Resolved',  // Trạng thái, chọn trong các giá trị cho trước
    ]);

    // gắn dữ liệu
    Issue::create([
      'computer_id' => $validatedData['computer_id'],
      'reported_by' => $validatedData['reported_by'],
      'reported_date' => $validatedData['reported_date'],
      'description' => $validatedData['description'],
      'urgency' => $validatedData['urgency'],
      'status' => $validatedData['status'],
    ]);

    return redirect()->route('index')->with('success', 'thêm thành côngcông');
  }

  //- /issue/edit/{id} (get)
  public function editIssue($id){
    //- lay ra cac computer
    $computers = Computer::all();

    //- lay ra issue
    $issue = Issue::find($id);
    $computer_isSelect = $issue->computer->computer_name;

    return view("Issue.edit", [
      'computers' => $computers,
      'issue' => $issue,
      'computer_isSelect' => $computer_isSelect,
    ]);
  }

  //- /issue/edit/{id} (patch)
  public function editIssuePatch(Request $req, $id)
  {
    //-validate
    $validatedData = $req->validate([
        'computer_id' => 'required|exists:computers,id',  // Kiểm tra xem máy tính có tồn tại trong bảng computers không
        'reported_by' => 'required|string|max:50',  // Báo cáo bởi, tối đa 50 ký tự
        'reported_date' => 'required|date',  // Ngày báo cáo, phải là ngày hợp lệ
        'description' => 'required|string',  // Mô tả sự cố
        'urgency' => 'required|in:Low,Medium,High',  // Mức độ khẩn cấp, chọn trong các giá trị cho trước
        'status' => 'required|in:Open,In Progress,Resolved',  // Trạng thái, chọn trong các giá trị cho trước
      ]);

    // Tim dua can sưa
    $issue = Issue::find($id);


    //- gán lại dữ liệu cần sửa
    $issue->computer_id = $validatedData['computer_id'];
    $issue->reported_by = $validatedData['reported_by'];
    $issue->reported_date = $validatedData['reported_date'];
    $issue->description = $validatedData['description'];
    $issue->urgency = $validatedData['urgency'];
    $issue->status = $validatedData['status'];

    $issue->save();

    return redirect()->route('index')->with('success', 'sửasửa thành côngcông');
  }


  //-delete issue
  public function deleteIssue($id){
    $issue = Issue::find($id);

    $issue->delete();
    return redirect()->route('index')->with('success', 'xóa thành côngcông');
  }
}
