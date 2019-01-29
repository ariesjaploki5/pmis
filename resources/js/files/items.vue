<template>
    <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-8"><div class="card-title">Items</div></div>
            <div class="col-4">
                <button class="btn btn-primary">Add</button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="card-body">
           <table class="table">
           		<thead>
           			<tr>
           				<th>ID</th>
           				<th>Item Code</th>
           				<th>Item Descriptions</th>
           				<th>Pap Code</th>
                        <th>Account Code</th>
                        <th>Action</th>
           			</tr>
           		</thead>
           		<tbody>
           			<tr>
                        <td></td>
                        <td></td>
           				<td></td>
           				<td></td>
           				<td></td>
           				<td></td>
           			</tr>
           		</tbody>
           </table> 
        </div>
    </div>  
</template>
<script>
    export default {
        data(){
            
        },
        methods: {
            loadall(){

            },
            create(){

            },
            store(){

            },
            edit(){

            },
            update(){

            },
            

            
        },
        created(){
            this.loadall();
        }
    }
</script>