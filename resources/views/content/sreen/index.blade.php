@extends('main')
@section('content')
    <div class="card">
        <div class="loan-index d-flex row">
            <div class="title-loan col-md-3">
                <h5 class="card-header">Màn hình</h5>
            </div>
            <div class="col-md-7">
                <form action="" class="row">
                    <div class="input-group input-group-merge col-md-4 search-loan">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" id="search" name="key_word" aria-label="Search..."
                            aria-describedby="basic-addon-search31">
                    </div>
                </form>
            </div>
            @if (Auth::check() && auth()->user()->role_id == 1)
            <div class="col-md-2" style="margin-top: 15px;">
                <a class="btn btn-success" href="{{ route('export-screen') }}">Xuất excel</a>
            </div>
            @endif
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered border-primary">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Stt</th>
        <th scope="col">Model</th>
        <th scope="col">Mô tả</th>
        <th scope="col">Màu sắc</th>
        <th scope="col">Giá niêm yết</th>
        <th scope="col">Giá ưu đãi hiển<br> thị trên website</th>
        <th scope="col">Tồn kho</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($data)
                    @foreach($data as $item)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$item['Model']}}</td>
                        <td style="white-space: normal;">
                            {{ $item['description'] }}
                        </td>
                        <td style="white-space: normal;">{{$item['color']}}</td>
                        <td>{{$item['afterTaxPriceDisplay']}}</td>
                        <td>{{$item['priceDisplay']}}</td>
                        <td>{{$item['stock']}}</td>
                    </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
