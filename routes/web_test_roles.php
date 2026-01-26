Route::get('/test-user-roles', function() {
$user = App\Models\User::where('email', 'root@conorld.com')->first();

if (!$user) {
return response()->json(['error' => 'User not found']);
}

return response()->json([
'user' => $user->name,
'email' => $user->email,
'roles' => $user->getRoleNames(),
'hasAdminRole' => $user->hasRole('admin'),
'hasRootRole' => $user->hasRole('root'),
]);
})->name('test.roles');