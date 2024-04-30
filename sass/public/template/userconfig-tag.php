<div class="container mt-4">
    <h2 class="text-center mb-4">User List</h2>
    <div class="table-responsive">
        <div id="order-list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12 col-md-12 d-flex justify-content-between align-items-center">
                    <!-- 显示搜索框 -->
                    <div id="order-list_filter" class="dataTables_filter">
                        <input type="text" class="form-control" autocomplete="off" id="searchTableList" placeholder="Search...">
              
                    </div>
                    <!-- 显示按钮 -->
                    <button type="button" class="btn btn-success mb-2 me-2" data-bs-toggle="modal" data-bs-target="#newOrderModal">
                       Add New Order
                    </button>
                </div>
            </div>
            <!--
                Comienza el Model Para crear un nuevo usuario
            -->
            <div class="modal fade" id="newOrderModal" tabindex="-1" aria-labelledby="newOrderModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newOrderModalLabel">Add New Order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="createorder-form">
                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Username</label>
                                    <input type="text" id="customername-field" class="form-control" placeholder="Enter username" required>
                                    <div class="invalid-feedback" id="username-error">Please enter a username.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="email-field" class="form-label">Email</label>
                                    <input type="email" id="email-field" class="form-control" placeholder="Enter email" required>
                                    <div class="invalid-feedback" id="email-error">Please enter a valid email.</div>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" id="admin-input" class="form-check-input">
                                    <label class="form-check-label" for="admin-input">Administrator</label>
                                </div>
                                <div class="mb-3">
                                    <label for="group-input" class="form-label">Group</label>
                                    <select class="form-select" id="group-input">
                                        <option selected disabled>Select a group</option>
                                        <option>Group 1</option>
                                        <option>Group 2</option>
                                        <option>Group 3</option>
                                        <option>Group 4</option>
                                        <option>Group 5</option>
                                    </select>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success" onclick="validateForm(event)">Create</button>
                                </div>
                            </form>
                        </div>
                        <!-- end modal body -->
                    </div>
                    <!-- end modal-content -->
                </div>
                <!-- end modal-dialog -->
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