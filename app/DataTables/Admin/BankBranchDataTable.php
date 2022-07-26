<?php

namespace App\DataTables\Admin;

use App\DataTables\CommonData;
use App\Exports\Admin\BankBranchExport;
use App\Models\BankBranch;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class BankBranchDataTable extends DataTable
{
    protected $exportClass = BankBranchExport::class;
    protected $commonData;
    private $mainRoute = 'admin.bank_management.bank_branches';

    public function __construct(CommonData $commonData)
    {
        $this->commonData = $commonData;
    }

    /**
     * Build DataTable class.
     *
     * @param  mixed  $query  Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query): DataTableAbstract
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('bank_name', function ($row) {
                return $row->bank->bank_name;
            })
            ->addColumn('status_switch', function ($row) {
                return view('admin.common.status', ['data' => $row, 'route' => $this->mainRoute]);
            })
            ->addColumn('action', function ($row) {
                return view('admin.common.action', [
                    'data' => $row, 'route' => $this->mainRoute, 'view' => false, 'edit' => true, 'delete' => true
                ]);
            })
            ->filter(function ($query) {
                if ($this->request()->has('bank_id') && !empty($this->request()->get('bank_id'))) {
                    $query->whereHas('bank', function ($q) {
                        $q->where('bank_id', $this->request()->get('bank_id'));
                    });
                }

                if ($this->request()->has('bank_name') && !empty($this->request()->get('bank_name'))) {
                    $query->where('bank_name', 'like', "%".$this->request()->get('bank_name')."%");
                }

                if ($this->request()->has('status') && !empty($this->request()->get('status'))) {
                    $query->where('status', $this->request()->get('status'));
                }
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param  BankBranch  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BankBranch $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model->query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html(): Builder
    {
        return $this->builder()
            ->minifiedAjax()
            ->dom('Blrtip')
            ->autoWidth(false)
            ->buttons($this->commonData->htmlButton($this->mainRoute))
            ->setTableId('dataTable')
            ->columns($this->getColumns())
            ->addAction(['width' => '100px'])
            ->orderBy([0, 'desc']);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            ['data' => 'id', 'title' => 'ID#', 'width' => '25px'],
            ['data' => 'bank_name', 'title' => 'Bank Name'],
            ['data' => 'branch_name', 'title' => 'Branch Name'],
            ['data' => 'status_switch', 'title' => 'Status', 'width' => '50px']
        ];
    }

    /**
     * List of columns to be printed.
     *
     * @var string|array
     */
    protected $printColumns = [
        ['data' => 'id', 'title' => 'ID#'],
        ['data' => 'bank_name', 'title' => 'Bank Name'],
        ['data' => 'branch_name', 'title' => 'Branch Name'],
        ['data' => 'status', 'title' => 'Status']
    ];

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Bank_Branches_'.date('YmdHis');
    }
}
