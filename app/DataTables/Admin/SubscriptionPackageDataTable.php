<?php

namespace App\DataTables\Admin;

use App\DataTables\CommonData;
use App\Exports\Admin\SubscriptionPackageExport;
use App\Models\SubscriptionPackage;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class SubscriptionPackageDataTable extends DataTable
{
    protected $exportClass = SubscriptionPackageExport::class;
    protected $commonData;
    private $mainRoute = 'admin.subscription_management.subscription_packages';

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
            ->addColumn('image', function ($row) {
                return '<img class="rounded-circle" src="'.$row->image_url.'" alt="'.$row->name.'" width="80" height="80">';
            })
            ->addColumn('pro_partners', function ($row) {
                $list = '<ul>';
                foreach ($row->proPartners as $proPartner) {
                    $list .= '<li>'.$proPartner->personalProfile->full_name.'</li>';
                }
                $list .= '</ul>';

                return $list;
            })
            ->addColumn('status_switch', function ($row) {
                return view('admin.common.status', ['data' => $row, 'route' => $this->mainRoute]);
            })
            ->addColumn('action', function ($row) {
                return view('admin.common.action', [
                    'data' => $row, 'route' => $this->mainRoute, 'view' => false, 'edit' => true, 'delete' => true
                ]);
            })
            ->rawColumns(['image','pro_partners'])
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
     * @param  SubscriptionPackage  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SubscriptionPackage $model): \Illuminate\Database\Eloquent\Builder
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
            ['data' => 'image', 'title' => 'Subscription Image', 'width' => '80px'],
            ['data' => 'name', 'title' => 'Subscription Name'],
            ['data' => 'description', 'title' => 'Description'],
            ['data' => 'pro_partners', 'title' => 'Pro Partners'],
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
        ['data' => 'image', 'title' => 'Subscription Image'],
        ['data' => 'name', 'title' => 'Subscription Name'],
        ['data' => 'description', 'title' => 'Description'],
        ['data' => 'pro_partners', 'title' => 'Pro Partners'],
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
