<?php

namespace App\DataTables\Admin;

use App\DataTables\CommonData;
use App\Exports\Admin\ServiceExport;
use App\Models\Service;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class ServiceDataTable extends DataTable
{
    protected $exportClass = ServiceExport::class;
    protected $commonData;
    private $mainRoute = 'admin.service_management.services';

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
            ->addColumn('vehicle_categories', function ($row) {

                $list = '<table>
                            <tr>
                                <th>Vehicle Size</th>
                                <th>Price</th>
                                <th>Estimated Time</th>
                            </tr>';

                foreach ($row->vehicleCategories as $vehicleCategory) {
                    $list .= '<tr>';
                    $list .= '<td>'.$vehicleCategory->name.'</td>';
                    $list .= '<td>'.'$'.$vehicleCategory->pivot->price.'</td>';
                    $list .= '<td>'.$vehicleCategory->pivot->estimated_time.' mins</td>';
                    $list .= '</tr>';
                }
                $list .= '</table>';

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
     * @param  Service  $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Service $model): \Illuminate\Database\Eloquent\Builder
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
            ['data' => 'image', 'title' => 'Service Image', 'width' => '80px'],
            ['data' => 'name', 'title' => 'Service Name'],
            ['data' => 'description', 'title' => 'Description'],
            ['data' => 'vehicle_categories', 'title' => 'Vehicle Categories'],
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
        ['data' => 'image', 'title' => 'Service Image'],
        ['data' => 'name', 'title' => 'Service Name'],
        ['data' => 'description', 'title' => 'Description'],
        ['data' => 'vehicle_categories', 'title' => 'Vehicle Categories'],
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
