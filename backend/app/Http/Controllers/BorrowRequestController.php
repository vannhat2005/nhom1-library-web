<?php

namespace App\Http\Controllers;

use App\Models\BorrowRequest;
use App\Models\BorrowTicket;
use Illuminate\Http\Request;

class BorrowRequestController extends Controller
{
    public function getAllBorrowRequest()
    {
        // Lấy tất cả các yêu cầu mượn sách từ cơ sở dữ liệu
        $borrowRequests = BorrowRequest::all();

        return response()->json([
            'status' => true,
            'message' => 'Lấy danh sách yêu cầu mượn sách thành công',
            'data' => $borrowRequests
        ]);
    }
    public function approveBorrowRequest(BorrowRequest $borrowRequest)
    {
        if ($borrowRequest->status != 0) {
            return response()->json([
                'status' => false,
                'message' => 'Yêu cầu này đã được xử lý trước đó!'
            ]);
        }
        // Cập nhật trạng thái của yêu cầu mượn sách thành "approved"
        $borrowRequest->status = 1;
        $borrowRequest->save();
        BorrowTicket::create([
            'borrow_request_id' => $borrowRequest->id,
            'user_id' => $borrowRequest->user_id,
            'book_id' => $borrowRequest->book_id,
            'borrow_date' => null,
            'due_date' => null,
            'status' => 0, // 0: Chưa mượn, 1: Đang mượn, 2: Đã trả, 3: Quá hạn
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Yêu cầu mượn sách đã được phê duyệt',
            'data' => $borrowRequest
        ]);
    }
    public function rejectBorrowRequest(BorrowRequest $borrowRequest)
    {
        if ($borrowRequest->status != 0) {
            return response()->json([
                'status' => false,
                'message' => 'Yêu cầu này đã được xử lý trước đó!'
            ]);
        }
        // Cập nhật trạng thái của yêu cầu mượn sách thành "rejected"
        $borrowRequest->status = 2;
        $borrowRequest->save();

        return response()->json([
            'status' => true,
            'message' => 'Yêu cầu mượn sách đã bị từ chối',
            'data' => $borrowRequest
        ]);
    }
}
