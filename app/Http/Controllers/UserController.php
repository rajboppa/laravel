<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function index()
    { 
     $data['users'] = User::orderBy('id','desc')->paginate(5);
     return view('users.index', $data);
    }

    public function create(){
        return view('users.create');        
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
            ]);
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->save();
            return redirect()->route('users.index')
            ->with('success','User has been created successfully.');            

    }

    public function edit(User $user){
        return view('users.edit',compact('user'));        
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->save();
        return redirect()->route('users.index')
        ->with('success','User Has Been updated successfully');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')
        ->with('success','User has been deleted successfully');
    }

}
