@extends('client.master')
@section('content')
    <div id="app_home">
        <div class="main-header style-four">
            <div class="header-lower">
                <div class="large-container">
                    <div class="outer-box">
                        <div class="category-box">
                            <p>All Categories</p>
                        </div>
                        <div class="search-info pull-right">
                            <form  class="search-form">
                                <div class="form-group">
                                    <input type="search" name="search-field" v-model="input_search.name" placeholder="Search Product..."
                                           required="">
                                    <button type="button" v-on:click="getProduct"><i class="flaticon-search"></i><span>Search</span></button>
                                </div>
                            </form>
                            <div class="select-box">
                                <select class="wide" v-on:change="getProduct" v-model="input_search.id_category">
                                    <option value="0">All Categories</option>
                                    <option  v-bind:value="0" hidden>@{{listCategory[0].product_type_name}}</option>
                                    <template v-for="(value, key) in listCategory">
                                        <option  v-bind:value="value.id">@{{value.product_type_name}}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            @include('client.component.topseller')
            @include('client.component.service')
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: "#app_home",
            data: {
                listCategory: [],
                listProduct: [],
                input_search : {
                    id_category : 0,
                    name : "",
                }
            },
            created() {
                this.getCategory();
                this.getProduct();
            },
            methods: {
                getCategory() {
                    axios
                        .get('/get-category')
                        .then((res) => {
                            this.listCategory = res.data.data;
                        });
                },
                getProduct() {
                    axios
                        .post('/get-product', this.input_search)
                        .then((res) => {
                            this.listProduct = res.data.data;
                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                },
                addToCart(id_product) {
                    var run = {
                        'id_product': id_product,
                    };
                    axios
                        .post('/add-to-cart', run)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.mess);
                            } else if (res.data.status == 0) {
                                toastr.error(res.data.mess);
                            } else if (res.data.status == 2) {
                                toastr.warning(res.data.mess);
                            }
                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                },
            },
        });
    </script>
@endsection
