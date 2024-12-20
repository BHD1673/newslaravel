<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\Models\Role;
use App\Models\User;

class AdminUsersController extends Controller
{
    private $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|max:20',
        'image' => 'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max-width:300,max-height:300',
        'role_id' => 'required|numeric'
    ];

    public function index()
    {

        return view('admin_dashboard.users.index', [
            'users' => User::with('role')->paginate(20),
        ]);
    }


    public function create()
    {
        return view('admin_dashboard.users.create', [
            'roles' => Role::pluck('name', 'id'),
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['password'] = Hash::make($request->input('password'));
        $user = User::create($validated);

        if ($request->has('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();
            $path   = $image->store('images', 'public');

            $user->image()->create([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
        }

        return redirect()->route('admin.users.create')->with('success', 'Thêm tài khoản thành công.');
    }


    public function edit(User $user)
    {
        return view('admin_dashboard.users.edit', [
            'user' => $user,
            'roles' => Role::pluck('name', 'id'),
        ]);
    }

    public function show(User $user)
    {
        return view('admin_dashboard.users.show', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->rules['password'] = 'nullable|min:3|max:20';
        $this->rules['email'] = ['required', 'email', Rule::unique('users')->ignore($user)];

        // Thêm validation cho premium và premium_expires_at
        $this->rules['is_premium'] = 'nullable|boolean';
        $this->rules['premium_expires_at'] = 'nullable|date|after_or_equal:now';

        // Validate thêm cho múi giờ Việt Nam
        $validated = $request->validate($this->rules);

        // Chuyển đổi thời gian nhập vào về múi giờ Việt Nam
        if (isset($validated['premium_expires_at'])) {
            $validated['premium_expires_at'] = \Carbon\Carbon::parse($validated['premium_expires_at'])->timezone('Asia/Ho_Chi_Minh');
        }

        // Cập nhật thông tin password
        if ($validated['password'] === null)
            unset($validated['password']);
        else
            $validated['password'] = Hash::make($request->input('password'));

        // Cập nhật thông tin premium
        if (isset($validated['is_premium']) && !$validated['is_premium']) {
            $validated['premium_expires_at'] = null; // Nếu không phải premium thì hủy thời gian hết hạn
        }

        // Cập nhật user
        $user->update($validated);

        // Xử lý ảnh đại diện nếu có
        if ($request->has('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();
            $path = $image->store('images', 'public');

            $user->image()->create([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
        }

        return redirect()->route('admin.users.edit', $user)->with('success', 'Sửa tài khoản thành công.');
    }



    public function destroy(User $user)
    {
        if ($user->id === auth()->id())
            return redirect()->back()->with('error', 'Bạn không thể xóa tài khoản bạn ( quản trị viên) ');

        User::whereHas('role', function ($query) {
            $query->where('name', 'admin');
        })->first()->posts()->saveMany($user->posts);

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Xóa tài khoản thành công.');
    }
}
