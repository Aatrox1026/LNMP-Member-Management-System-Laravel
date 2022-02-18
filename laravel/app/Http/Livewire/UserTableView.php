<?php

namespace App\Http\Livewire;

use App\Models\User;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class UsersTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('ID')->sortBy('id'),
            Header::title('Email')->sortBy('email'),
            'Password',
            Header::title('is_Admin')->sortBy('isAdmin'),
            Header::title('Created')->sortBy('create_at'),
            Header::title('Updated')->sortBy('update_at')
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->id,
            $model->email,
            $model->password,
            $model->isAdmin,
            $model->create_at->diffforHumans(),
            $model->update_at->diffforHumans()
        ];
    }
}
