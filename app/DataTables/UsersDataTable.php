<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                return $row->status ? "Active" : "In-Active";
            })
            ->addColumn('action', function ($row) {
                return view('shared.action_button', ['panel' => 'user', 'id' => $row->id]);
            });
    }

    public function query(User $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create')
            );
    }

    protected function getColumns()
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('S.N'),
            Column::make('name'),
            Column::make('email'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
