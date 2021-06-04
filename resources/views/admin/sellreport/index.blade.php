@extends('admin.layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Sell Report </h2>
                <hr>
                <form action="{{ route('sellreport.index') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label for="food_item_id">Food Item</label>
                            <select name="food_item_id" class="form-control @error('food_item_id') is-invalid @enderror">
                                <option value="0">Select Food Name</option>
                                @if(!blank($food_items))
                                    @foreach($food_items as $food_item)
                                        <option value="{{ $food_item->id }}" <?=($food_item_id == $food_item->id) ? 'selected' : ''?>>{{ $food_item->food_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="from_date">Form Date</label>
                            <input type="date" class="form-control p-input @error('from_date') is-invalid @enderror" name="from_date" value="{{ old('from_date', $from_date) }}">
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="to_date">To Date</label>
                            <input type="date" class="form-control p-input @error('to_date') is-invalid @enderror" name="to_date" value="{{ old('to_date', $to_date) }}">
                        </div>

                        <div class="form-group col-lg-3">
                            <button type="submit" class="btn btn-success" style="margin-top: 28px; padding: 11px 40px">Get Result</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($showView)
        <div class="col-lg-12" style="margin-top: 30px">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        Sell Report list
                    </h2>
                    <div class="table-responsive">
                        <table class="table center-aligned-table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Food Item
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Sell Quantity
                                    </th>
                                    <th>
                                        Available Quantity
                                    </th>
                                    <th>
                                        Total Price
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!blank($qfood_items))
                                    @php
                                        $total_price         = 0;
                                        $total_sell_qty      = 0;
                                        $total_available_qty = 0;
                                        $total_total_price   = 0;
                                    @endphp
                                    @foreach($qfood_items as $food_item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $food_item->food_name }}</td>
                                            <td>{{ number_format($food_item->Food_price,2) }}</td>
                                            <td>
                                                <?php 
                                                    $sellqty = isset($sell_food_item[$food_item->id]) ? $sell_food_item[$food_item->id]['sellqty'] : 0;
                                                    echo $sellqty;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    $oldsellqty = isset($oldsellquantity[$food_item->id]) ? $oldsellquantity[$food_item->id]['oldsellqty'] : 0;
                                                    $available_qty = $food_item->quantity - $oldsellqty;
                                                    echo $available_qty;
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    $sellprice =  isset($sell_food_item[$food_item->id]) ? $sell_food_item[$food_item->id]['sellprice'] : 0; 

                                                    echo number_format($sellprice, 2);

                                                    $total_price += $food_item->Food_price;
                                                    $total_sell_qty += $sellqty;
                                                    $total_available_qty += $available_qty;
                                                    $total_total_price += $sellprice;

                                                ?>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2"><b>Total Summary</b></td>
                                        <td><?=number_format($total_price, 2)?></td>
                                        <td><?=$total_sell_qty?></td>
                                        <td><?=$total_available_qty?></td>
                                        <td><?=number_format($total_total_price, 2)?></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>  
@endsection
