<?php


namespace App\Http\Requests;


class AllCandidatesFilterRequest {

    public function __construct(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'status' => 'nullable|string|in:complete,hold',
            'city' => 'nullable|string|min:2|max:50',
            'position' => 'nullable|string|min:2|max:50',
            'level' => 'nullable|string|in:low,below middle,middle,above middle,high',
            'work_time_id' => 'nullable|integer|exists:work_times,id',
            'order_by_result' => 'nullable|string|in:asc,desc',
            'order_by_first_name' => 'nullable|string|in:asc,desc',
            'order_by_last_name' => 'nullable|string|in:asc,desc',
            'rows' => 'nullable|integer|between:1,100',
            'filters' => 'nullable|boolean',
        ]);
    }
}
