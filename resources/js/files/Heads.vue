te<template>
    <div class="card">
        <div class="card-body">
			<div class="row">
				<div class="col">
					<div class="card-title">Heads</div>
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
						<th>Employee ID</th>
						<th>Division</th>
           				<th>Action</th>
           			</tr>
           		</thead>
           		<tbody>
           			<tr v-for="head in heads.data" :key="head.id">
           				<td>{{ head.id }}</td>
           				<td>{{ head.employeeid }}</td>
						<td>{{ head.division.description }}</td>
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
                heads: {},
                form: new Form({
                    id: '',
					employeeid: '',
					division_id: '',
                }),
                
			}
		},
		methods: {
            load_all(){
                this.get_heads();
            },
            get_heads(){
                axios.get('api/heads')
                .then(({data}) => (this.heads = data));
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