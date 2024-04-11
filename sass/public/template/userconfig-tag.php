<div class="container mt-4">
    <h2 class="text-center mb-4">User List</h2>
    <div class="table-responsive">
        <div id="order-list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <!-- 显示搜索框 -->
                    <div id="order-list_filter" class="dataTables_filter">
                        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="order-list"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table align-middle table-nowrap dt-responsive nowrap w-100 table-check dataTable no-footer dtr-inline" id="order-list" aria-describedby="order-list_info">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 24px;" class="align-middle sorting" tabindex="0" aria-controls="order-list" rowspan="1" colspan="1" aria-label=": activate to sort column ascending">
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th class="align-middle sorting sorting_desc" tabindex="0" aria-controls="order-list" rowspan="1" colspan="1" style="width: 113px;" aria-sort="descending" aria-label="Order ID: activate to sort column ascending">User ID</th>
                                <th class="align-middle sorting" tabindex="0" aria-controls="order-list" rowspan="1" colspan="1" style="width: 168px;" aria-label="Billing Name: activate to sort column ascending">Email</th>
                                <th class="align-middle sorting" tabindex="0" aria-controls="order-list" rowspan="1" colspan="1" style="width: 137px;" aria-label="Date: activate to sort column ascending">Username</th>
                                <th class="align-middle sorting" tabindex="0" aria-controls="order-list" rowspan="1" colspan="1" style="width: 79px;" aria-label="Total: activate to sort column ascending">Administrator</th>
                                <th class="align-middle sorting" tabindex="0" aria-controls="order-list" rowspan="1" colspan="1" style="width: 198px;" aria-label="Payment Status: activate to sort column ascending">Groups</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo $html;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>