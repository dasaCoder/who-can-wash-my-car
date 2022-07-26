<?php

namespace App\DataTables\Admin;

use App\DataTables\CommonData;
use App\Exports\Admin\FaqExport;
use App\Models\Faq;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class FaqDataTable extends DataTable
{
    protected $exportClass = FaqExport::class;
    protected $commonData;
    private $mainRoute = 'admin.web_content_management.faqs';

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
            ->addColumn('status_switch', function ($row) {
                return view('admin.common.status', ['data' => $row, 'route' => $this->mainRoute]);
            })
            ->addColumn('action', function ($row) {
                return view('admin.common.action', [
                    'data' => $row, 'route' => $this->mainRoute, 'view' => false, 'edit' => true, 'delete' => true
                ]);
            })
            ->filter(function ($query) {
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
     * @param  Faq  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Faq $model): \Illuminate\Database\Eloquent\Builder
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
            ['data' => 'question', 'title' => 'Question'],
            ['data' => 'answer', 'title' => 'Answer'],
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
        ['data' => 'question', 'title' => 'Question'],
        ['data' => 'answer', 'title' => 'Answer'],
        ['data' => 'status', 'title' => 'Status']
    ];

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Services_'.date('YmdHis');
    }
}
