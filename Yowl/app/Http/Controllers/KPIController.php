<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Filters\CommentFilter;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CommentCollection;

class KPIController extends Controller
{
    public function comments_per_category()
    {
        $comments = DB::table('comments')
            ->selectRaw('comments.category_id, categories.name, count(comments.id) as count')
            ->join('categories', 'comments.category_id', '=', 'categories.id')
            ->groupByRaw('category_id')
            ->orderByDesc('count')
            ->limit(3)
            ->get();

        return $comments;
    }

    // Ranking of users by number of likes sent (lovers ranking)
    public function ranking_user_likes_sent(Request $request, $long)
    {
        $ranking = DB::table('likes')
            ->selectRaw('users.name, count(likes.id) as like_count')
            ->join('users', 'likes.user_id', '=', 'users.id')
            ->groupByRaw('user_id')
            ->orderByDesc('like_count')
            ->limit($long)
            ->get();
        return $ranking;
    }

    // Ranking of users by number of reports sent (haters ranking)
    public function ranking_user_reports_sent(Request $request, $long)
    {
        $ranking = DB::table('reports')
            ->selectRaw('users.name, count(reports.id) as reports_count')
            ->join('users', 'reports.user_id', '=', 'users.id')
            ->groupByRaw('user_id')
            ->orderByDesc('reports_count')
            ->limit($long)
            ->get();
        return $ranking;
    }

    // Comment with most likes (most loved comments)
    public function most_liked_comments(Request $request, $long)
    {
        $most_liked_comments = DB::table('likes')
            ->selectRaw('comments.id, comments.title, comments.content, comments.url, count(likes.id) as likes_count')
            ->join('comments', 'likes.comment_id', '=', 'comments.id')
            ->groupByRaw('likes.comment_id')
            ->orderByDesc('likes_count')
            ->limit($long)
            ->get();
        return $most_liked_comments;
    }

    // Comment with most reports (most hated comments)
    public function most_hated_comments(Request $request, $long)
    {
        $most_hated_comments = DB::table('reports')
            ->selectRaw('comments.id, comments.title, comments.content, comments.url, count(reports.id) as reports_count')
            ->join('comments', 'reports.comment_id', '=', 'comments.id')
            ->groupByRaw('reports.comment_id')
            ->orderByDesc('reports_count')
            ->limit($long)
            ->get();
        return $most_hated_comments;
    }

    // Most recent comments
    public function most_recent_comments(Request $request, $long)
    {
        $most_recent = DB::table('comments')
            ->selectRaw('id, title, content, url, created_at')
            ->orderByDesc('created_at')
            ->limit($long)
            ->get();
        return $most_recent;
    }

    //Most liked users (influencers)
    public function most_liked_users(Request $request, $long)
    {
        $most_liked_users = DB::table('likes')
            ->selectRaw('users.name, count(likes.id) as likes_count')
            ->join('comments', 'likes.comment_id', '=', 'comments.id')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->groupByRaw('users.name')
            ->orderByDesc('likes_count')
            ->limit($long)
            ->get();
        return $most_liked_users;
    }

    //Most liked categories
    public function most_liked_categories(Request $request, $long)
    {
        $most_liked_categories = DB::table('likes')
            ->selectRaw('categories.name, count(likes.id) as likes_count')
            ->join('comments', 'likes.comment_id', '=', 'comments.id')
            ->join('categories', 'comments.category_id', '=', 'categories.id')
            ->groupByRaw('categories.name')
            ->orderByDesc('likes_count')
            ->limit($long)
            ->get();
        return $most_liked_categories;
    }

    //Most reported categories
    public function most_reported_categories(Request $request, $long)
    {
        $most_reported_categories = DB::table('reports')
            ->selectRaw('categories.name, count(reports.id) as reports_count')
            ->join('comments', 'reports.comment_id', '=', 'comments.id')
            ->join('categories', 'comments.category_id', '=', 'categories.id')
            ->groupByRaw('categories.name')
            ->orderByDesc('reports_count')
            ->limit($long)
            ->get();
        return $most_reported_categories;
    }

    public function most_reported_users(Request $request, $long)
    {
        $most_reported_users = DB::table('reports')
            ->selectRaw('users.name, count(reports.id) as reports_count')
            ->join('comments', 'reports.comment_id', '=', 'comments.id')
            ->join('users', 'comments.category_id', '=', 'users.id')
            ->groupByRaw('users.name')
            ->orderByDesc('reports_count')
            ->limit($long)
            ->get();
        return $most_reported_users;
    }

    // Random comment pick
    public function random_comment_pick(Request $request, $long)
    {
        $test=DB::table('comments')
        ->select('comments.id','comments.title',DB::raw('COUNT(DISTINCT likes.id) AS like_count'),DB::raw('COUNT(DISTINCT responses.id) AS response_count'))
        ->leftJoin('likes','comments.id','=','likes.comment_id')
        ->leftJoin('responses','comments.id','=','responses.comment_id')
        ->groupBy('comments.id')
        ->inRandomOrder() 
        ->limit($long)
        ->get();

        return $test;
    }
    

    //total account created since the launching
    public function total_account()
    {
        $total_account = DB::table('users')
            ->selectRaw('count(id) as total_account')
            ->get();
        return $total_account;
    }

    //total account created for the last 24h
    public function creation()
    {
        $creation = DB::table('creations')
            ->selectRaw('count(id) as total_account_created_the_last_24h')
            ->where('created_at', '>', Carbon::now()->subDays(1))
            ->get();
        return $creation;
    }

    //total account closed for the last 24h
    public function closure()
    {
        $closure = DB::table('closures')
            ->selectRaw('count(id) as total_account_closed_the_last_24h')
            ->where('created_at', '>', Carbon::now()->subDays(1))
            ->get();
        return $closure;
    }

    
}
