te<template>
    <div class="card">
        <div class="card-body">
			<div class="row">
				<div class="col">
					<div class="card-title">Departments</div>
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
						<th>Division</th>
           				<th>Action</th>
           			</tr>
           		</thead>
           		<tbody>
           			<tr v-for="department in departments.data" :key="department.id">
           				<td>{{ department.id }}</td>
           				<td>{{ department.description }}</td>
						<td>{{ department.division.description }}</td>
           				<td>
                               <button class="btn btn-sm btn-success" @click="edit_unit(department)">Edit</button>
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
                departments: {},
                form: new Form({
                    id: '',
					description: '',
					division_id: '',
                }),
                
			}
		},
		methods: {
            load_all(){
                this.get_departments();
            },
            get_departments(){
                axios.get('api/departments')
                .then(({data}) => (this.departments = data));
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