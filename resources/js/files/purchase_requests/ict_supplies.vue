<template>
    <div class="card">
        <div class="card-body">
			<div class="row">
				<div class="col">
					<div class="card-title">Purchase Requests</div>
				</div>
				<div class="col text-right">
					<button class="btn btn-primary btn-sm" @click="create_purchase_request">Add</button>
					<div class="modal fade" id="pruchase_request_modal" tabindex="-1" role="dialog" aria-labelledby="pruchase_request_modal_label" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
								<div class="modal-header">
								<h5 v-show="!editmode" class="modal-title" id="pruchase_request_modal_label">Purchase Request</h5>
								<h5 v-show="editmode" class="modal-title" id="pruchase_request_modal_label">Update Request</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
								<form @submit.prevent="editmode ? update_purchase_request() : store_purchase_request()" class="text-left">
									<div class="modal-body">
										<div class="form-group">
											<label for="item_code">Purpose</label>
											<textarea v-model="form.purpose" class="form-control form-control-sm" rows="4"></textarea>
										</div>
										<div class="form-group">
											<table class="table">
												<thead>
													<tr>
														<th width="70%">Item</th>
														<th width="30%">Quantity</th>
														<th></th>
													</tr>
												</thead>
												<tbody id="t1">
													<tr v-for="it in form.items" :key="it.id">
														<td>
															<select class="form-control form-control-sm" v-model="it.id">
																<option v-for="item in items" :key="item.id" :value="item.id">{{ item.description }}</option>
															</select>
														</td>
														<td>
															<input type="number" class="form-control form-contrl-sm text-right" v-model="it.quantity">
														</td>
														<td></td>
													</tr>
													<button type="button" class="btn btn-sm btn-primary" @click="add_new_item">Add</button>
												</tbody>
											</table>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" @click="store_purchase_request()" class="btn btn-success">Submit</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
           <table class="table">
           		<thead>
           			<tr>
           				<th width="8%">PR#</th>
           				<th>Purpose</th>
           				<th>Items</th>
           				<th>Quantity</th>
						<th>Unit Cost</th>
						<th>Total Cost</th>
           				<th>Action</th>
           			</tr>
           		</thead>
           		<tbody>
           			<tr v-for="pr in prs" :key="pr.id">
           				<td>{{ pr.created_at | myDate}}-{{ pr.id }}</td>
						<td>{{ pr.purpose }}</td>
           				<td>
							<div v-for="item in pr.items" :key="item.id">
								<p>{{ item.description }}</p>
							</div>
						</td>
           				<td>
							   <div v-for="item in pr.items" :key="item.id">
							<p>{{ item.pivot.quantity }}</p>
							   </div>
						</td>
           				<td>
							<div v-for="item in pr.items" :key="item.id">
							<p>{{ item.cost }}</p>
						</div>
						</td>
           				<td>
							<div v-for="item in pr.items" :key="item.id">
								<p>{{ item.pivot.total_cost }}</p>
							</div>
						</td>
           				<td><button class="btn btn-sm btn-danger" @click="delete_purchase_request(pr.id)">Delete</button></td>
           				
           			</tr>
           		</tbody>
           </table> 
        </div>
    </div>  
</template>
<script>
    export default {
		data(){
			return{
				editmode: false,
				prs: {},
				items: {},

				form: new Form({
					id: '',
					purpose: '',
					items: [{
						id: "", quantity: ""
					}],
				}),
			}
		},
		methods: {
			load_all(){
				this.get_purchase_requests();
				this.get_all_items();

			},
			get_all_items(){
				axios.get('api/all_items').then(({data}) => this.items = data);
			},
			get_purchase_requests(){
				axios.get('api/purchase_requests').then(({data}) => this.prs = data);
			},
			create_purchase_request(){
				this.editmode = false;
				
                $('#pruchase_request_modal').modal('show');
			},

			add_new_item(){
				this.form.items.push({
					id: "", quantity: ""
				});
			},
			store_purchase_request(){
				this.form.post('api/purchase_request').then(() => {

				}).catch(() => {

				});
				// axios.post('api/purchase_request', {
				// 	purpose: this.form.purpose,
				// 	items: this.itemss,
				// }).then(({data}) => {

					
                // }).catch(() => {

				// });
			},
			
			
			edit_purchase_request(pr){

			},
			update_purchase_request(){
				this.form.put('api/purchase_request/'+this.form.id).then(() => {

				}).catch(() => {

				});
			},
			delete_purchase_request(id){

				axios.delete('api/purchase_request/'+id+'/delete').then(() => {
					
                    Fire.$emit('success');

                
				}).catch(() => {

				});
			},

		},
		computed:{
			get: function() {
         		return this.asking_price - this.down_payment;
			},
			set: function(newValue) {
				this.down_payment = this.asking_price - newValue;
			}
		},
		created(){
			this.load_all();
			Fire.$on('success',() => {
                this.load_all();
                
            });
		},
    }
</script>