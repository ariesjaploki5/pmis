te<template>
    <div class="card">
        <div class="card-body">
			<div class="row">
				<div class="col">
					<div class="card-title">Divisions</div>
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
           			<tr v-for="division in divisions.data" :key="division.id">
           				<td>{{ division.id }}</td>
           				<td>{{ division.description }}</td>
           				<td>
                            
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
                divisions: {},
                form: new Form({
                    id: '',
                    description: '',
                }),
                
			}
		},
		methods: {
            load_all(){
                this.get_divisions();
            },
            get_divisions(){
                axios.get('api/divisions')
                .then(({data}) => (this.divisions = data));
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