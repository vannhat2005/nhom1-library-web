<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowTicket;
use App\Models\User;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function getSummaryData()
    {
        // Tổng số sách
        $totalBooks = Book::count();

        // Số sách đang được mượn
        $borrowedBooks = BorrowTicket::where('status', 1)->count();
        // Số sách quá hạn
        $overdueBooks = BorrowTicket::where('status', 3)->count();
        // Tổng số người dùng (bạn đọc)
        $totalUsers = User::where('role', 2)->count();

        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu thống kê thành công',
            'total_books' => $totalBooks,
            'borrowed_books' => $borrowedBooks,
            'overdue_books' => $overdueBooks,
            'total_users' => $totalUsers
        ]);
    }
    public function getRecentBorrowData()
    {
        $data = BorrowTicket::join('books', 'borrow_tickets.book_id', '=', 'books.id')
            ->join('users', 'borrow_tickets.user_id', '=', 'users.id')
            ->select('borrow_tickets.*', 'books.title as book_title', 'users.full_name as user_name')
            ->where('borrow_tickets.status', '!=', 0)
            ->orderByDesc('borrow_tickets.borrow_date')
            ->take(5)
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu mượn gần đây thành công',
            'data' => $data
        ]);
    }
}
