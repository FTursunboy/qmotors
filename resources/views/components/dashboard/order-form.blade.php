@php
$order = $attributes['order'];
@endphp
<button class="btn btn-primary mb-2">+</button>
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $order->id }}">
    <table class="table table-bordered">
        <thead>
            <th>Product</th>
            <th>Price</th>
            <th>Count</th>
            <th>Total Price</th>
            <th>Action</th>
        </thead>
        <tbody>
            <tr v-for="(item, index) in order.order_products" :key="index">
                <td>
                    <select class="form-control" v-model="item.product_id" @change="productChange($event, item.id)">
                        <option v-for="(el,i) in products" :key="i" :value="el.id">@{{ el.name }}
                        </option>
                    </select>
                </td>
                <td>@{{ item.product.price }}</td>
                <td>
                    <input type="number" min="1" v-model="item.count" class="form-control">
                </td>
                <td>@{{ item.product.price * item.count }}</td>
                <td>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    <button type="submit" class="btn btn-success float-right">Save</button>
</form>

@push('scripts')

<script type="module">
    import {
        createApp
    } from "{{ asset('/frontend/js/petite-vue.js') }}"

    createApp({
        products: @json($products),
        order: @json($order),
        productChange(e, id){
            // console.log(e.target.value, id);
            const product_id = e.target.val;
            const order_product = this.order.order_products.find(item => item.id == id);
            const product1 = this.products.find(item => item.id == product_id);
            console.log(this.order.order_products, this.products);
            order_product.count = 1;
            order_product.price = product.price;
            order_product.product_id = product.id;
            order_product.name = product.name;
        }
    }).mount()
</script>
@endpush