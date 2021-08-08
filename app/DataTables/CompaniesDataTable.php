<?php

namespace App\DataTables;

use App\Models\Company;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CompaniesDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('logo', function ($row) {
                if ($row->logo) {
                    return '<img src="' . asset('storage/uploads/images/company/' . $row->logo) . '" width="50">';
                }
                return 'N/A';
            })
            ->addColumn('status', function ($row) {
                return $row->status ? "Active" : "In-Active";
            })
            ->addColumn('action', function ($row) {
                return view('backend.common.action_button', ['panel' => 'company', 'id' => $row->id]);
            })
            ->rawColumns(['logo']);
    }

    public function query(Company $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('companies-table')
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
            Column::make('logo'),
            Column::make('name'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('website'),
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
        return 'Companies_' . date('YmdHis');
    }
}
