<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\UploadFileTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    use UploadFileTrait;

    private $model;
    private $listRoute;

    public function __construct()
    {
        $this->model = new User();
        $this->listRoute = redirect()->route('user.index');
    }

    public function index(Request $request)
    {
        $search = $request->get('key_word');
        $perPage = 15;

        $users = User::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('phone', 'LIKE', '%' . $search . '%');
        })
            ->latest()
            ->paginate($perPage);
        return view('content.user.index', compact('users'));
    }

    public function create()
    {
        return view('content.user.add');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return back()->with('message', 'Thêm thành công');
    }

}
