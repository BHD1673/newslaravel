<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\Models\Role;
use App\Models\User;

use App\Http\Services\UserService;

class AdminUsersController extends Controller
{

    protected $userService;
    public function __construct()
    {
        $this->userService = new UserService();
    }

    private $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|max:20',
        'image' => 'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max-width:300,max-height:300',
        'role_id' => 'required|numeric'
    ];

    public function index()
    {
        $users = $this->userService->index();
        $isNoAdmin = $this->userService->isNoAdmin();
        return view('admin_dashboard.users.index', compact('users', 'isNoAdmin'));
    }

  
    public function create()
    {
        return view('admin_dashboard.users.create', [
            'roles' => Role::pluck('name','id'),
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['password'] = Hash::make($request->input('password'));
        $user = User::create($validated);

        if($request->has('image'))
        {
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
        $isNoAdmin = $this->userService->isNoAdmin();
        return view('admin_dashboard.users.edit', [
            'user' => $user,
            'is_no_admin' => $isNoAdmin,
            'roles' => Role::pluck('name','id'),
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
        $this->rules['email'] = ['required','email', Rule::unique('users')->ignore($user)];

        $validated = $request->validate($this->rules);

        if($validated['password'] === null )
            unset($validated['password']);
        else
            $validated['password'] = Hash::make($request->input('password'));

        $user->update($validated);

        if($request->has('image'))
        {
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
        
        return redirect()->route('admin.users.edit', $user)->with('success', 'Sửa tài khoản thành công.');
    }


    public function destroy(User $user)
    {
        if($user->id === auth()->id())
            return redirect()->back()->with('error', 'Bạn không thể xóa tài khoản bạn ( quản trị viên) ');

        User::whereHas('role', function($query){
            $query->where('name','admin');
        })->first()->posts()->saveMany($user->posts);

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Xóa tài khoản thành công.');
    }
}
