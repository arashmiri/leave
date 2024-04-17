<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Personnel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmployeePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        if($user->isAdministrator())
        {
            return true;
        }

        return Response::deny('تنها ادمین مجاز به ویرایش اطلاعات کاربران می باشد');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Employee $employee): Response
    {
        return $user->isAdministrator()
        ? Response::allow()
        : Response::deny('تنها ادمین مجاز به ویرایش اطلاعات کاربر است');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Personnel $personnel): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Personnel $personnel): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Personnel $personnel): bool
    {
        //
    }
}
