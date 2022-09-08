<?php

namespace App\Http\Livewire\Customer;

use App\Models\Category;
use App\Models\CategoryGroup;
use App\Models\Customer;
use App\Models\PriceTemplate;
use App\Models\Profile;
use App\Models\Status;
use App\Models\Tag;
use App\Models\User;
use App\Models\Zone;
use App\Traits\HasTimeRangeOptions;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use HasTimeRangeOptions, WithPagination;

    public $categoryOptions;
    public $categoryGroupOptions;
    public $customerForm;
    public $filters = [
        'category_id' => '',
        'category_group_id' => '',
        'created_in' => '',
        'code' => '',
        'handled_by' => '',
        'name' => '',
        'price_template_id' => '',
        'profile_id' => '',
        'status_id' => '',
        'zone_id' => '',
    ];
    public $itemPerPage = 200;
    protected $listeners = [
        'refresh' => '$refresh',
        'childSaved' => 'childSaved',
        'childModalClosed' => 'childModalClosed',
    ];
    public $profileOptions;
    public $showEditModal = false;
    public $sortKey = '';
    public $sortAscending = true;
    public $statusOptions;
    public $tagOptions;
    public $userOptions;
    public $zoneOptions;

    public function mount()
    {
        $className = new Customer();

        $this->showEditModal = false;
        $this->categoryOptions = Category::query()
                                        ->where('classname', get_class($className))
                                        ->orderBy('sequence')
                                        ->get();
        $this->categoryGroupOptions = CategoryGroup::query()
                                        ->whereHas('categories', function($query) use ($className){
                                            $query->where('classname', get_class($className));
                                        })->orderBy('name')->get();
        $this->priceTemplateOptions = PriceTemplate::query()
                                    ->orderBy('name')
                                    ->get();
        $this->profileOptions = Profile::query()
                                    ->orderBy('name')
                                    ->get();
        $this->statusOptions = Status::query()
                                    ->where('classname', $className)
                                    ->orderBy('sequence')
                                    ->get();
        $this->tagOptions = Tag::query()
                                ->orderBy('name')
                                ->get();
        $this->userOptions = User::query()
                                    ->orderBy('name')
                                    ->get();
        $this->zoneOptions = Zone::query()
                                    ->orderBy('sequence')
                                    ->orderBy('name')
                                    ->get();
        $this->monthOptions = $this->getMonthsWithYear(2);
    }

    public function render()
    {
        $customers = Customer::with([
            'attachments',
            'billingAddress',
            'category',
            'category.categoryGroup',
            'deliveryAddress',
            'firstTransaction',
            'payTerm',
            'priceTemplate',
            'profile',
            'status',
            'tagBindings',
            'zone'
        ]);

        $customers = $this->queryFilters($customers, $this->filters);

        if($sortKey = $this->sortKey) {
            $customers = $customers->orderBy($sortKey, $this->sortAscending ? 'asc' : 'desc');
        }else {
            $customers = $customers->orderBy('created_at', 'desc');
        }

        $customers = $customers->paginate($this->itemPerPage);

        return view('livewire.customer.index', [
            'customers' => $customers,
        ]);
    }

    private function queryFilters($query, $filters)
    {
        $category_id = is_array($filters['category_id']) ? $filters['category_id'] : [$filters['category_id']];
        $category_group_id = is_array($filters['category_group_id']) ? $filters['category_group_id'] : [$filters['category_group_id']];
        $code = $filters['code'];
        $created_in = $filters['created_in'];
        $handled_by = $filters['handled_by'];
        $name = $filters['name'];
        $price_template_id = $filters['price_template_id'];
        $profile_id = $filters['profile_id'];
        $status_id = $filters['status_id'];
        $zone_id = $filters['zone_id'];

        $query = $query
                ->when($category_id, fn($query, $input) => $query->whereHas('category', function($query) use ($input) {
                    $query->whereIn('id', $input);
                }))
                ->when($category_group_id, fn($query, $input) => $query->whereHas('category.categoryGroup', function($query) use ($input) {
                    $query->whereIn('id', $input);
                }))
                ->when($code, fn($query, $input) => $query->where('code', 'LIKE', '%'.$input.'%'))
                ->when($created_in, fn($query, $input) => $query->whereDate('created_at', '>=', Carbon::createFromFormat('m-Y', $input)->startOfMonth())->whereDate('created_at', '<=', Carbon::createFromFormat('m-Y', $input)->endOfMonth()))
                ->when($handled_by, fn($query, $input) => $query->where('handled_by', $input))
                ->when($name, fn($query, $input) => $query->where('name', 'LIKE', '%'.$input.'%'))
                ->when($price_template_id, fn($query, $input) => $query->where('price_template_id', $input))
                ->when($profile_id, fn($query, $input) => $query->where('profile_id', $input))
                ->when($status_id, fn($query, $input) => $query->where('status_id', $input))
                ->when($zone_id, fn($query, $input) => $query->where('zone_id', $input));

        return $query;
    }
}
