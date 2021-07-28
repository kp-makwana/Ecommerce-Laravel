<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $request = $request->all();
        $queryBuilder = User::with('country')->where('role', 'user');

        if (isset($request['search'])) {
            $query = $request['search'];
            if (ctype_digit($query)) {
                $queryBuilder->where('contact_no', 'LIKE', $query . '%');
            } else if ($query[0] == '#') {
                $find_id = substr($query, 1);
                $queryBuilder->where('id', $find_id);
            } else if ($query[0] == '+') {
                $find_country = substr($query, 1);
                $queryBuilder->where('country_code', $find_country);
            } else {
                $queryBuilder->where('f_name', 'LIKE', '%' . $query . '%')
                    ->orWhere('f_name', 'LIKE', '%' . $query . '%')
                    ->orWhere('email', 'LIKE', '%' . $query . '%')
                    ->orWhere('username', 'LIKE', '%' . $query . '%');
            }
        }

        if (isset($request['no_of_record'])) {
            if (in_array($request['no_of_record'], config('constants.num_of_raw'))) {
                $users = $queryBuilder->sortable()->paginate($request['no_of_record']);
            } else {
                $users = $queryBuilder->sortable()->paginate(10);
            }
        } else {
            $users = $queryBuilder->sortable()->paginate(10);
        }

        return view('admin.users.index', ['users' => $users, 'request' => $request]);
    }
}
