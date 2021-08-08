<?php

namespace App\DataTables;

use App\Models\Employee;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EmployeesDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('company', function ($row) {
                return $row->company->name;
            })
            ->addColumn('name', function ($row) {
                if ($row->middle_name) {
                    return $row->first_name . ' ' . $row->middle_name . ' ' . $row->last_name;
                }
                return $row->first_name . ' ' . $row->last_name;
            })
            ->addColumn('status', function ($row) {
                return $row->status ? "Active" : "In-Active";
            })
            ->addColumn('action', function ($row) {
                return view('backend.common.action_button', ['panel' => 'employee', 'id' => $row->id]);
            });
    }

    public function query(Employee $model)
    {
        return $model->newQuery()->with('company');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('employees-table')
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
            Column::make('company'),
            Column::make('email'),
            Column::make('phone'),
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
        return 'Employees_' . date('YmdHis');
    }
}
