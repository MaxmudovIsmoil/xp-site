<div class="table-responsive mt-3">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('product_specification.store', $id) }}" method="POST">
        @csrf
        <table class="table table-bordered js_specification_table">
            <thead>
            <tr>
                <th colspan="4"><h4 class="text-center">Structure</h4></th>
                <th width="60px"><span class="btn btn-primary js_add_tr_btn"><i class="fas fa-plus"></i></span></th>
            </tr>
            </thead>
            <tbody data-count-row="0">
            <tr class="js_one_tr" data-row="0">
                <td colspan="3" class="first-td">
                    <div class="d-flex">
                        <div class="w-100">
                            <input type="hidden" class="form-control" name="ProductST[0][order]" value="0" />
                            <input type="text" class="form-control" name="ProductST[0][en][key]" placeholder="Model en" />
                            <input type="text" class="form-control my-1" name="ProductST[0][ru][key]" placeholder="Model ru"/>
                            <input type="text" class="form-control" name="ProductST[0][uz][key]" placeholder="Model uz"/>
                        </div>
                        <span class="btn btn-sm btn-outline-dark ml-1 js_bold_this_td_btn"><i class="fas fa-bold"></i></span>
                    </div>
                </td>
                <td>
                    <div class="d-flex">
                        <div class="w-100">
                            <input type="text" class="form-control" name="ProductST[0][en][value1]" placeholder="Text en">
                            <input type="text" class="form-control my-1" name="ProductST[0][ru][value1]" placeholder="Text ru">
                            <input type="text" class="form-control" name="ProductST[0][uz][value1]" placeholder="Text uz">
                        </div>
                        <span class="btn btn-sm btn-outline-danger mx-1 js_remove_this_td_btn"><i class="fas fa-minus"></i></span>
                    </div>
                </td>
                <td width="30">
                    <div class="d-flex">
                        <span class="btn btn-sm btn-outline-success mr-2 mt-1 js_add_this_td_btn "><i class="fas fa-plus"></i></span>
                        <span class="btn btn-danger js_remove_tr_btn"><i class="fas fa-minus"></i></span>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <button type="submit" class="save-button btn btn-success">Save</button>
    </form>
</div>
