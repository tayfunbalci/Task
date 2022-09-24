<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return UserResource|JsonResponse
     */
    public function register(Request $request){
        $userData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'tel' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'code' => 'required|string|exists:students,code'
        ]);

        try {
            DB::beginTransaction();
            $student = Student::where('code', $userData['code'])->whereNull('user_id')->first();
            if(!$student){
                $error = ['errors' => ["error" => ["Girdiğiniz kod daha önce kullanılmış. Lütfen velisi olduğunuz öğrenci kodunu giriniz."], "message" => ""]];
                return new JsonResponse($error, 422);
            }

            $user = User::create([
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'tel' => $userData['tel'],
                'email' => $userData['email'],
                'password' => bcrypt($userData['password'])
            ]);

            $student->update([
                'user_id' => $user->id
            ]);

            DB::commit();
            return new UserResource($user);
        } catch (QueryException $queryException) {
            DB::rollBack();
            report($queryException);
            $error = ['errors' => ["error" => ["Hesap oluşturma işleminde veri tabanı hatası."]], "message" => ""];
            return new JsonResponse($error, 500);
        } catch (\Throwable $throwable) {
            DB::rollBack();
            report($throwable);
            $error = ['errors' => ["error" => ["Hesap oluşturma işleminde beklenmedik hata oluştu."]], "message" => ""];
            return new JsonResponse($error, 500);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'app_name' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if( !$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->app_name, ['parent'])->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return new JsonResponse($response, 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        auth()->user()->currentAccessToken()->delete();

        return new JsonResponse(['message' => 'Logged out'], 200);
    }

    /**
     * @return UserResource
     */
    public function getAuthUser()
    {
        return new UserResource(auth()->user());
    }

    /**
     * @param Request $request
     * @return UserResource
     */
    public function updateAuthUser(Request $request)
    {
        $userData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'tel' => 'required|string',
            'password' => 'nullable|string|confirmed|min:8',
        ]);

        $user = auth()->user();


        if(!empty($userData['password'])) {
            $user->update([
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'tel' => $userData['tel'],
                'password' => bcrypt($userData['password'])
            ]);
            return new UserResource($user);
        }

        $user->update([
            'first_name' => $userData['first_name'],
            'last_name' => $userData['last_name'],
            'tel' => $userData['tel'],
        ]);

        return new UserResource($user);
    }

}
