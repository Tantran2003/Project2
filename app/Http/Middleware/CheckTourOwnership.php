<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckTourOwnership
{
    public function handle($request, Closure $next)
    {
        $tourId = $request->route('tourId'); // Điều này giả sử rằng bạn đang sử dụng route parameter 'tour_id'

        // Kiểm tra xem người dùng có quyền xem thông tin tour hay không
        if (!Auth::user()->booking()->where('id', $tourId)->exists()) {
            abort(403, 'Unauthorized access'); // Hoặc chuyển hướng hoặc xử lý theo yêu cầu của bạn
        }

        return $next($request);
    }
}
