<?php

namespace App\DataTables\Admin;

use App\DataTables\CommonData;
use App\Exports\Admin\SubscriptionPlanExport;
use App\Models\SubscriptionPlan;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class SubscriptionPlanDataTable extends DataTable
{
    protected $exportClass = SubscriptionPlanExport::class;
    protected $commonData;
    private $mainRoute = 'admin.subscription_management.subscription_plans';

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
            ->addColumn('subscription_package', function ($row) {
                return $row->subscriptionPackage->name;
            })
            ->addColumn('subscription_duration', function ($row) {
                return $row->subscriptionDuration->months.' Months';
            })
            ->addColumn('subscription_payment_term', function ($row) {
                return $row->subscriptionPaymentTerm->term;
            })
            ->addColumn('status_switch', function ($row) {
                return view('admin.common.status', ['data' => $row, 'route' => $this->mainRoute]);
            })
            ->addColumn('action', function ($row) {
                return view('admin.common.action', [
                    'data' => $row, 'route' => $this->mainRoute, 'view' => false, 'edit' => true, 'delete' => true
                ]);
            })
            ->rawColumns(['image','vehicle_categories'])
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
     * @param  SubscriptionPlan  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SubscriptionPlan $model): \Illuminate\Database\Eloquent\Builder
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
            ['data' => 'subscription_package', 'title' => 'Subscription Package'],
            ['data' => 'subscription_duration', 'title' => 'Duration'],
            ['data' => 'subscription_payment_term', 'title' => 'Payment Term'],
            ['data' => 'price', 'title' => 'Price'],
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
        ['data' => 'subscription_package', 'title' => 'Subscription Package'],
        ['data' => 'subscription_duration', 'title' => 'Duration'],
        ['data' => 'subscription_payment_term', 'title' => 'Payment Term'],
        ['data' => 'price', 'title' => 'Price'],
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
