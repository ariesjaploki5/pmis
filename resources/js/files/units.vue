te<template>
    <div class="card">
        <div class="card-body">
			<div class="row">
				<div class="col">
					<div class="card-title">Units</div>
				</div>
				<div class="col">
					<div class="card-tools text-right">
						<button class="btn btn-primary btn-sm">Add</button>
					</div>
				</div>
			</div>
           <table class="table">
           		<thead>
           			<tr>
           				<th>ID</th>
						<th>Description</th>
           				<th>Action</th>
           			</tr>
           		</thead>
           		<tbody>
           			<tr v-for="unit in units.data" :key="unit.id">
           				<td>{{ unit.id }}</td>
           				<td>{{ unit.description }}</td>
           				<td>
                               <button class="btn btn-sm btn-success" @click="edit_unit(unit)">Edit</button>
                        </td>
           			</tr>
           		</tbody>
           </table> 
        </div>
    </div>  
</template>
<script>
    export default {
		data() {
			return{
                units: {},
                form: new Form({
                    id: '',
                    description: '',
                }),
                
			}
		},
		methods: {
            load_all(){
                this.get_units();
            },
            get_units(){
                axios.get('api/units')
                .then(({data}) => (this.units = data));
            },
            create_unit(){
                
            },
            store_unit(){

            },
            edit_unit(unit){

            },
            update_unit(){

            },
		},
		created(){
            this.load_all();
		}
    }
</script>