<?php

namespace App\Http\Controllers\admin\order;

use App\Core\order\OrderInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ordernew;
use Illuminate\Support\Facades\DB;
use App\Models\Donate;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $orderInterface;
    public function __construct(OrderInterface $orderInterface)
    {
        $this->orderInterface = $orderInterface;
    }
    public function index()
    {
        //$orders = $this->orderInterface->fetchAllorders();
        $orders = DB::table('ordernew as o')
            ->select('o.*', 'p.name as product_name')
            ->leftJoin('products as p', 'o.product_id', '=', 'p.id')
            ->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function donate()
    {
        $donate = Donate::get();
        return view('admin.orders.donate', compact('donate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = $this->orderInterface->showOrderDetails($id);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = $this->orderInterface->showOrderDetails($id);
        $statusOptions = \App\enum\OrderStatus::values(); // Get all status values from the enum
        return view('admin.orders.edit', compact('order', 'statusOptions'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'status', 'email', 'street_address', 'appertment_house_no', 'town_city', 'state', 'postcode']); // Fields allowed to update

        $order = $this->orderInterface->updateOrder($id, $data); // Update the order using the repository
        return redirect()->route('orders.index')->with('msg', 'Order updated successfully'); // Redirect with success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->orderInterface->deleteOrder($id);
        return redirect()->route('orders.index')->with('msg', 'Order deleted successfully!');
    }
}
