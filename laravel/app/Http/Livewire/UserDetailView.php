<?php

namespace App\Http\Livewire;

use App\Models\User;
use LaravelViews\Views\DetailView;

class UserDetailView extends DetailView
{
    protected $modelClass = User::class;

    public function heading($model) {
        return [
            'UserName',
            'User Profile'
        ];
    }

    /**
     * @param $model Model instance
     * @return array Array with all the detail data or the components
     */
    public function detail($model)
    {
        return [
            'EMAIL' => $model->email,
            'PASSWORD' => $model->password,
            'IS_ADMIN' => $model->isAdmin,
            'CREATED' => $model->create_at->diffforHumans(),
            'UPDATED' => $model->update_at->diffforHumans()
        ];
    }
}
