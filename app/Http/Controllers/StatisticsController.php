<?php
namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Book;
use App\Models\User;

class StatisticsController extends Controller
{
    public function statistics()
    {
        // Top 3 libros más solicitados
        $topBooks = Book::withCount('loans')
                        ->orderByDesc('loans_count')
                        ->take(3)
                        ->get();

        // Top 3 usuarios más activos
        $topUsers = User::withCount('loans')
                        ->orderByDesc('loans_count')
                        ->take(3)
                        ->get();

        return view('statistics.statistics', compact('topBooks', 'topUsers'));
    }
}