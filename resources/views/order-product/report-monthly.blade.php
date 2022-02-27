<x-themequiz title="">
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-header">Monthly Report</div>
                <div class="card-body">
                    <form method="GET" action="{{ url('/order-product/reportmonthly') }}" accept-charset="UTF-8">
                        <div class="form-row">
                            <div class="col-4">
                                @php
                                $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                @endphp
                                <select class="form-control" name="month" id="month">
                                    <option value="">เลือกเดือน</option>
                                    @foreach($months as $item)
                                    <option value="{{ $loop->iteration }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <script>
                                    document.querySelector("#month").value = "{{ request('month') }}"
                                </script>
                            </div>
                            <div class="col-4">
                                @php
                                //$start_at = 2020;
                                $start_at = date('Y');
                                @endphp
                                <select class="form-control" name="year" id="year">
                                    <option value="">เลือกปี</option>
                                    @for($year = $start_at; $year > $start_at - 5 ; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                <script>
                                    document.querySelector("#year").value = "{{ request('year') }}"
                                </script>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Report Month : {{ request('month') }} / {{ request('year') }} </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Completed At</th>
                                    <th>Order Id</th>
                                    <th>Product Id</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderproduct as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->completed_at }}</td>
                                    <td>{{ $item->order_id }}</td>
                                    <td>
                                        <div><img src="{{ url('storage/'.$item->product->photo )}}" width="100" /> </div>
                                        <div>{{ $item->product->title }}</div>
                                    </td>
                                    <td>{{ $item->sum_quantity }}</td>
                                    <td>{{ $item->avg_price }}</td>
                                    <td>{{ $item->sum_total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h2>รวมราคาสินค้า {{ number_format($orderproduct->sum('sum_total')) }} บาท</h2>




                </div>
            </div>
        </div>
    </div>
</div>
</x-themequiz>